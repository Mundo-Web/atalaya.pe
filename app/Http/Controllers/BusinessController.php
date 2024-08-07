<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Person;
use App\Models\UsersByServicesByBusiness;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use SoDe\Extend\JSON;

class BusinessController extends BasicController
{
    public $model = Business::class;
    public $softDeletion = true;
    public $reactView = 'Businesses';

    public function setReactViewProperties()
    {
        $businesses = Business::with(['person', 'owner', 'contact'])->where('created_by', Auth::user()->id)->get();
        $businessesIWork = Business::select([
            DB::raw('DISTINCT businesses.*'),
            // 'users_by_services_by_businesses.invitation_accepted',
            // 'users_by_services_by_businesses.invitation_token'
        ])
            ->with(['person', 'owner', 'contact', 'myServices'])
            ->join('services_by_businesses', 'services_by_businesses.business_id', 'businesses.id')
            ->join('users_by_services_by_businesses', 'users_by_services_by_businesses.service_by_business_id', 'services_by_businesses.id')
            ->where('users_by_services_by_businesses.user_id', Auth::user()->id)
            ->get();
        return [
            'businesses' => $businesses,
            'businessesIWork' => $businessesIWork,
            'economic_sectors' => JSON::parse(Storage::get('utils/economic_sectors.json')),
            'business_activities' => JSON::parse(Storage::get('utils/business_activities.json')),
        ];
    }

    public function beforeSave(Request $request)
    {
        $body = $request->all();

        $personJpa = Person::updateOrCreate([
            'document_type' => 'RUC',
            'document_number' => $body['business']['ruc']
        ], [
            'document_type' => 'RUC',
            'document_number' => $body['business']['ruc'],
            'name' => $body['business']['tradename'],
            'lastname' => $body['business']['businessname'],
            'created_by' => Auth::user()->id
        ]);

        $ownerJpa = Person::updateOrCreate([
            'document_type' => $body['owner']['document_type'],
            'document_number' => $body['owner']['document_number']
        ], [
            'document_type' => $body['owner']['document_type'],
            'document_number' => $body['owner']['document_number'],
            'name' => $body['owner']['name'],
            'lastname' => $body['owner']['lastname'],
            'created_by' => Auth::user()->id
        ]);

        $contactJpa = Person::updateOrCreate([
            'document_type' => $body['owner']['document_type'],
            'document_number' => $body['owner']['document_number']
        ], [
            'document_type' => $body['owner']['document_type'],
            'document_number' => $body['owner']['document_number'],
            'name' => $body['owner']['name'],
            'lastname' => $body['owner']['lastname'],
            'created_by' => Auth::user()->id
        ]);
        unset($body['business']);
        unset($body['owner']);
        unset($body['contact']);

        $body['name'] = $personJpa->name;
        $body['person_id'] = $personJpa->id;
        $body['owner_id'] = $ownerJpa->id;
        $body['contact_id'] = $contactJpa->id;
        $body['created_by'] = Auth::user()->id;

        $businessJpa = Business::where('person_id', $personJpa->id)->first();
        if ($businessJpa) throw new Exception('Ya existe una empresa con estos datos');

        return $body;
    }

    public function afterSave(Request $request, object $jpa)
    {
        return $jpa->person->document_number;
    }

    public function thumbnail(Request $request, $uuid)
    {
        try {
            $content = Storage::get('logo/thumbnail/' . $uuid . '.img');
            if (!$content) throw new Exception('Logo no encontrado');
            return response($content, 200, [
                'Content-Type' => 'application/octet-stream'
            ]);
        } catch (\Throwable $th) {
            $content = Storage::get('utils/user-404.svg');
            return response($content, 200, [
                'Content-Type' => 'image/svg+xml'
            ]);
        }
    }

    public function full(Request $request, $uuid)
    {
        try {
            $content = Storage::get('logo/' . $uuid . '.img');
            if (!$content) throw new Exception('Logo no encontrado');
            return response($content, 200, [
                'Content-Type' => 'application/octet-stream'
            ]);
        } catch (\Throwable $th) {
            $content = Storage::get('utils/business-404.svg');
            return response($content, 200, [
                'Content-Type' => 'image/svg+xml'
            ]);
        }
    }
}
