<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class UserView extends Authenticatable
{
    use HasFactory;
    protected $table = 'users_view';
}
