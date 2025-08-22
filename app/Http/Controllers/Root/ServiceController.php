<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Models\Service;
use Illuminate\Http\Request;
use SoDe\Extend\Response;

class ServiceController extends BasicController
{
    public $model = Service::class;
    public $reactView = 'Root/Services';

    public function setReactViewProperties()
    {
        $services = Service::with(['plans'])->get();
        return [
            'services' => $services
        ];
    }

    public function status(Request $request)
    {
        $response = Response::simpleTryCatch(function () use ($request) {
            $this->model::where('id', $request->id)
                ->update([
                    'status' => $request->status ? 0 : 1
                ]);

            return $this->model::with(['plans'])->find($request->id);
        });
        return response($response->toArray(), $response->status);
    }
}
