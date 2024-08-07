<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LandingForm extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre', 'email', 'telefono', 'cargo', 'empresa', 'mensaje', 'tipocontacto', 'urlweb', 'source', 'fecha',
        'hora', 'lead', 'ip', 'llegade', 'anchodispositivo', 'largodispositivo', 'latitud', 'longitud', 'sistema'
    ];
}
