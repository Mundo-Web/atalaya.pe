<?php

namespace App\Http\Controllers\Root;

use App\Http\Controllers\BasicController;
use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanController extends BasicController
{
    public $model = Plan::class;

    public function afterSave(Request $request, object $jpa)
    {
        return $jpa;
    }
}
