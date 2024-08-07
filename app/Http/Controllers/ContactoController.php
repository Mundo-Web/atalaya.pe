<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    public function storeContacto(Request $request)
    {
        

        $reglasValidacion = [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|integer|max:99999999999',
            'tipoproyecto' => 'required|string|max:255',
            'tipocontacto' => 'required|string|max:255',
            'horacontacto' => 'required|string|max:255',
            'urlweb' => 'string|max:255',
        ];
    
        $mensajes = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.integer' => 'El campo teléfono debe ser un número entero.',
            'tipoproyecto.required' => 'El campo tipo de proyecto es obligatorio.',
            'tipoproyecto.max' => 'El campo tipo de proyecto no puede tener más de :max caracteres.',
            'mensaje.required' => 'El campo mensaje es obligatorio.',
            'tipocontacto.required' => 'El campo tipo de contacto es obligatorio.',
            'tipocontacto.max' => 'El campo tipo de contacto no puede tener más de :max caracteres.',
            'horacontacto.required' => 'El campo hora de contacto es obligatorio.',
            'horacontacto.date_format' => 'El formato de la hora de contacto no es válido.',
        ];


        $request->validate($reglasValidacion, $mensajes);

        $contacto = Contacto::create($request->all());
       
        return redirect()->route('contacto', $contacto)->with('mensaje','Mensaje enviado exitoso');
    }
}
