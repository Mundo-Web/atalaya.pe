<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\Business;
use Illuminate\Support\Facades\Auth;

class ServiceController extends BasicController
{
    public $model = Service::class;
    public $softDeletion = true;
    public $reactView = 'Services';

    public function setReactViewProperties()
    {
        $businesses = Business::with('owner', 'contact', 'person')
            ->where('created_by', Auth::user()->id)
            ->where('status', true)
            ->get();
        $services = Service::all();
        return [
            'businesses' => $businesses,
            'services' => $services
        ];
    }
}
