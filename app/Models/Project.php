<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'type_id',
        'client_id',
        'name',
        'description',
        'cost',
        'signed_at',
        'starts_at',
        'ends_at',
    ];
}
