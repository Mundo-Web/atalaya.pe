<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'document_type',
        'document_number',
        'name',
        'lastname',
        'birthdate',
        'gender',
        'email',
        'phone',
        'ubigeo',
        'address',
        'created_by',
    ];
}
