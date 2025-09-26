<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Models\ServicesByBusiness;
use Illuminate\Http\Request;

class ServicesByBusinessController extends BasicController
{
    public $model = ServicesByBusiness::class;
}
