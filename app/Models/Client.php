<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    protected $connection = "mysql_atalaya";

    protected $fillable=['ruc','name','country_prefix', 'business_sector', 'description', 'contact_name', 'contact_phone' , 'contact_email', 'contact_address' ,'contact_position', 'message' ,
                        'web_url', 'source', 'date', 'time', 'ip', 'origin', 'client_width', 'client_height', 'client_latitude', 'client_longitude', 
                        'client_system', 'status_id'
                        ];
}
