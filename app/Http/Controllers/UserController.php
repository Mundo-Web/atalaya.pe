<?php

namespace App\Http\Controllers;

use App\Http\Classes\dxResponse;
use App\Models\dxDataGrid;
use App\Models\ModelHasRoles;
use App\Models\User;
use App\Models\UserView;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Routing\ResponseFactory;
use SoDe\Extend\Crypto;
use SoDe\Extend\JSON;
use SoDe\Extend\Response;

class UserController extends BasicController
{
    public $model = User::class;
    
    public function setPaginationInstance(string $model)
    {
        return $model::select()->with('person');
    }

    public function save(Request $request): HttpResponse|ResponseFactory
    {
        $response = new Response();
        try {
            $jpa = null;
            if ($request->id) {
                $jpa = User::find($request->id);
            }
            if (!$jpa) {
                if (!isset($request->password) || !isset($request->confirm)) throw new Exception('Debes ingresar una contraseña para el nuevo usuario');
                $jpa = new User();
                $jpa->relative_id = Crypto::randomUUID();
            }
            $jpa->name = $request->name;
            $jpa->lastname = $request->lastname;
            $jpa->email = $request->email;

            if (
                isset($request->password) && isset($request->confirm)
            ) {
                if (Controller::decode($request->password) == Controller::decode($request->confirm)) {
                    $jpa->password = password_hash(Controller::decode($request->password), PASSWORD_DEFAULT);
                } else throw new Exception('Las contraseñas deben ser iguales');
            }

            $jpa->save();

            ModelHasRoles::where('model_id', $jpa->id)
                ->where('model_type', User::class)
                ->delete();

            foreach ($request->roles as $role) {
                ModelHasRoles::create([
                    'role_id' => $role,
                    'model_id' => $jpa->id,
                    'model_type' => User::class
                ]);
            }

            $response->status = 200;
            $response->message = 'Operacion correcta';
            $response->data = $jpa->toArray();
        } catch (\Throwable $th) {
            $response->status = 400;
            $response->message = $th->getMessage();
        } finally {
            return response(
                $response->toArray(),
                $response->status
            );
        }
    }
}
