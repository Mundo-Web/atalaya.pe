<?php

namespace App\Http\Controllers;

use App\Models\BusinessSign;
use App\Http\Requests\StoreBusinessSignRequest;
use App\Http\Requests\UpdateBusinessSignRequest;
use App\Models\Business;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class BusinessSignController extends BasicController
{
    public $model = BusinessSign::class;
    public $reactView = 'Signs.jsx';
    public $imageFields = ['sign'];
    // public $publicMedia = true;
    public $softDeletion = false;

    public function setPaginationInstance(string $model)
    {
        return $model::select('business_signs.*')
            ->distinct()
            ->join('businesses', 'businesses.id', 'business_signs.business_id')
            ->join('services_by_businesses', 'services_by_businesses.business_id', 'businesses.id')
            ->where('business_signs.user_id', Auth::id());
    }

    public function setReactViewProperties()
    {
        $businessesIWork = Business::select('businesses.*')
            ->with(['person', 'owner', 'contact', 'myServices'])
            ->distinct()
            ->join('services_by_businesses', 'services_by_businesses.business_id', 'businesses.id')
            ->join('users_by_services_by_businesses', 'users_by_services_by_businesses.service_by_business_id', 'services_by_businesses.id')
            ->where('users_by_services_by_businesses.user_id', Auth::user()->id)
            ->where('users_by_services_by_businesses.invitation_accepted', true)
            ->get();

        $signs = BusinessSign::select('business_signs.*')
            ->distinct()
            ->join('businesses', 'businesses.id', 'business_signs.business_id')
            ->join('services_by_businesses', 'services_by_businesses.business_id', 'businesses.id')
            ->where('business_signs.user_id', Auth::id())
            ->get();

        return [
            'businesses' => $businessesIWork,
            'signs' => $signs
        ];
    }
    public function beforeSave(Request $request)
    {
        $body = $request->all();

        $business = Business::select(['businesses.id', 'businesses.name'])
            ->join('services_by_businesses', 'services_by_businesses.business_id', 'businesses.id')
            ->join('users_by_services_by_businesses', 'users_by_services_by_businesses.service_by_business_id', 'services_by_businesses.id')
            ->where('businesses.uuid', $body['business_id'])
            ->where('users_by_services_by_businesses.user_id', Auth::id())
            ->where('users_by_services_by_businesses.invitation_accepted', true)
            ->first();
        if (!$business) throw new Exception('No está autorizado para realizar esta acción');

        $sign = BusinessSign::find($request->id);
        $signsCount = BusinessSign::where('business_id', $business->id)->where('user_id', Auth::id())->count();
        if (!$sign && $signsCount >= 4) {
            throw new Exception('No puede registrar más de 4 firmas');
        }

        return [
            // 'id' => BusinessSign::select('id')
            //     ->where('user_id', Auth::id())
            //     ->where('business_id', $business->id)
            //     ->first()?->id,
            'id' => BusinessSign::find($request->id)?->id,
            'user_id' => Auth::id(),
            'business_id' => $business->id
        ];
    }

    public function afterSave(Request $request, object $jpa)
    {
        return $jpa->sign;
    }
}
