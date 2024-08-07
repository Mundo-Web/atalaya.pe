<?php

namespace App\Http\Controllers;

use App\Models\Status;

class StatusController extends BasicController
{
    public $model = Status::class;
    public $softDeletion = true;
}
