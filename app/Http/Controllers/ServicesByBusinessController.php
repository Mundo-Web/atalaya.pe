<?php

namespace App\Http\Controllers;

use App\Models\ServicesByBusiness;
use App\Http\Requests\StoreServicesByBusinessRequest;
use App\Http\Requests\UpdateServicesByBusinessRequest;
use App\Models\Business;
use App\Models\Service;
use App\Models\UsersByServicesByBusiness;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SoDe\Extend\Fetch;
use SoDe\Extend\JSON;
use SoDe\Extend\Response;

class ServicesByBusinessController extends BasicController
{
    public function byBusiness(Request $request, string $businessRuc)
    {
        $response = new Response();
        try {
            $results = ServicesByBusiness::select('services_by_businesses.*')
                ->with('service', 'users', 'users.person')
                ->join('businesses', 'businesses.id', 'services_by_businesses.business_id')
                ->join('people', 'people.id', 'businesses.person_id')
                ->where('people.document_type', 'RUC')
                ->where('people.document_number', $businessRuc)
                ->get();

            $response->status = 200;
            $response->message = 'Operacion correcta';
            $response->data = $results;
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

    public function enableService(Request $request)
    {
        $response = Response::simpleTryCatch(function ($response) use ($request) {
            $serviceJpa = Service::select()
                ->where('correlative', $request->service)
                ->where('status', true)
                ->first();
            if (!$serviceJpa) throw new Exception('El servicio que intentas habilitar no existe o esta deprecado');

            $businessJpa = Business::select('businesses.*')
                ->join('people', 'people.id', 'businesses.person_id')
                ->where('people.document_number', $request->business)
                ->where('businesses.created_by', Auth::user()->id)
                ->first();
            if (!$businessJpa) throw new Exception('La empresa no existe o no es de tu propiedad');

            $sbb = ServicesByBusiness::updateOrCreate([
                'service_id' => $serviceJpa->id,
                'business_id' => $businessJpa->id
            ], [
                'service_id' => $serviceJpa->id,
                'business_id' => $businessJpa->id,
                'created_by' => Auth::user()->id
            ]);

            UsersByServicesByBusiness::updateOrCreate([
                'service_by_business_id' => $sbb->id,
                'user_id' => Auth::user()->id
            ], [
                'created_by' => Auth::user()->id,
                'invitation_accepted' => true
            ]);

            $protocol = env('APP_PROTOCOL', 'https');
            $correlative = $serviceJpa->correlative;
            $domain = env('APP_DOMAIN');
            $uuid = $businessJpa->uuid;

            $res = new Fetch("{$protocol}://{$correlative}.{$domain}/api/start/{$uuid}");
            // $res = file_get_contents("{$protocol}://{$correlative}.{$domain}/api/start/{$uuid}");
            if (!$res->ok) {
                ServicesByBusiness::where('id', $sbb->id)->delete();
                dump($res->text());
                throw new Exception('Ocurrio un error al inicializar el servicio ' . $serviceJpa->name);
            }

            $data = $res->json();
            if ($data['status'] != 200) {
                ServicesByBusiness::where('id', $sbb->id)->delete();
                throw new Exception($data['message'] ?? 'Ocurrio un error inesperado al inicializar el servicio ' . $serviceJpa->name);
            }
        });

        return response(
            $response->toArray(),
            $response->status
        );
    }
}
