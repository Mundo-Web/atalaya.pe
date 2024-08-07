<?php

namespace App\Http\Controllers;

use App\Models\PreUser;
use App\Http\Requests\StorePreUserRequest;
use App\Http\Requests\UpdatePreUserRequest;

class PreUserController extends BasicController
{
    public $model = PreUser::class;
    public $softDeletion = false;
}
