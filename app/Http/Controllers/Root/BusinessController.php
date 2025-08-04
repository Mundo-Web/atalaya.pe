<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends BasicController
{
    public $model = Business::class;
    public $softDeletion = true;
    public $reactView = 'Root/Businesses';

    public function setReactViewProperties()
    {
        $businesses = Business::with(['creator', 'users.service'])
            ->where('status', true)
            ->get();
        return [
            'businesses' => $businesses
        ];
    }
}
