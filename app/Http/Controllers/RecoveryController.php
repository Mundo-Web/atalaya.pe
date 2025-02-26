<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RecoveryController extends BasicController
{
    public $model = User::class;
    public $reactView = 'Recovery';
    public $reactRootView = 'auth';
}
