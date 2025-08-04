<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvitationEmail extends Model
{
    use HasFactory, HasUuids;

    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'email',
        'service_by_business_id',
        'invitation_token',
        'created_by'
    ];

    // Relación con Business a través de ServiceByBusiness
    public function business()
    {
        return $this->hasOneThrough(Business::class, ServicesByBusiness::class, 'id', 'id', 'service_by_business_id', 'business_id');
    }

    // Relación con Service a través de ServiceByBusiness
    public function service()
    {
        return $this->hasOneThrough(Service::class, ServicesByBusiness::class, 'id', 'id', 'service_by_business_id', 'service_id');
    }
}
