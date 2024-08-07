<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'password',
        'person_id',
        'confirmation_token',
        'token',
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }
}
