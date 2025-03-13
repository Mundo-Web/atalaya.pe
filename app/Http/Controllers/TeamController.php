<?php

namespace App\Http\Controllers;

use App\Models\UsersByServicesByBusiness;
use Illuminate\Support\Facades\Auth;

class TeamController extends BasicController
{
    public $model = UsersByServicesByBusiness::class;
    public $prefix4filter = 'users_by_services_by_businesses';
    public $softDeletion = false;

    public function setPaginationInstance(string $model)
    {
        return $model::select('users_by_services_by_businesses.*')
            ->with(['user.person', 'business.owner', 'service'])
            ->distinct()
            ->join('services_by_businesses', 'users_by_services_by_businesses.service_by_business_id', 'services_by_businesses.id')
            ->join('businesses', 'services_by_businesses.business_id', 'businesses.id')
            ->where('businesses.owner_id', Auth::user()->person_id);
    }
}
