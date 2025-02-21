<?php

namespace App\Http\Controllers;

use App\Models\Service;

class LandingController extends BasicController
{
    public $reactView = 'Landing';
    public $reactRootView = 'public';

    public function setReactViewProperties()
    {
        $services = Service::all();
        return [
            'services' => $services
        ];
    }
}
