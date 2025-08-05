<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Models\Business;
use App\Models\ServicesByBusiness;
use Exception;
use Illuminate\Http\Request;
use SoDe\Extend\Response;

class BusinessController extends BasicController
{
    public $model = Business::class;
    public $softDeletion = false;
    public $reactView = 'Root/Businesses';

    public function setReactViewProperties()
    {
        $businesses = Business::with(['creator', 'services',  'users.service'])
            ->get();
        return [
            'businesses' => $businesses
        ];
    }

    public function status(Request $request)
    {
        $response = Response::simpleTryCatch(function () use ($request) {
            $this->model::where('id', $request->id)
                ->update([
                    'status' => $request->status ? 0 : 1
                ]);

            return $this->model::with(['creator', 'users.service'])->find($request->id);
        });
        return response($response->toArray(), $response->status);
    }

    public function delete(Request $request, string $id)
    {
        $response = Response::simpleTryCatch(function () use ($id) {

            ServicesByBusiness::where('business_id', $id)
                ->delete();

            $deleted = $this->softDeletion
                ? $this->model::where('id', $id)
                ->update(['status' => null])
                : $this->model::where('id', $id)
                ->delete();

            if (!$deleted) throw new Exception('No se ha eliminado ningun registro');
        });

        return response($response->toArray(), $response->status);
    }

    public function byUser(Request $request, string $id)
    {
        $response = Response::simpleTryCatch(function () use ($request, $id) {
            $businesses = Business::query()
                ->with(['services', 'users'])
                ->where('created_by', $id)
                ->get();
            return $businesses;
        });
        return response($response->toArray(), $response->status);
    }
}
