<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\Person;
use App\Models\ServicesByBusiness;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SoDe\Extend\Response;

class UserController extends BasicController
{
    public $model = User::class;
    public $reactView = 'Root/Users';
    public $softDeletion = false;

    public function setPaginationInstance(string $model)
    {
        return $model::query()
            ->with(['person', 'roles'])
            ->withCount(['businesses']);
    }

    public function delete(Request $request, string $id)
    {
        DB::beginTransaction();
        $response = Response::simpleTryCatch(function () use ($id) {
            Business::where('created_by', $id)->update(['created_by' => null]);
            Person::where('created_by', $id)->update(['created_by' => null]);
            ServicesByBusiness::where('created_by', $id)->delete();

            $deleted = $this->softDeletion
                ? $this->model::where('id', $id)
                ->update(['status' => null])
                : $this->model::where('id', $id)
                ->delete();

            if (!$deleted) throw new Exception('No se ha eliminado ningun registro');
            DB::commit();
        }, fn() => DB::rollBack());
        return response($response->toArray(), $response->status);
    }
}
