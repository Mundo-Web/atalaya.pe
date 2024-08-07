<?php

namespace App\Http\Controllers;

use App\Http\Classes\EmailConfig;
use App\Models\Landing;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLandingRequest;
use App\Http\Requests\UpdateLandingRequest;
use App\Jobs\SendLandingFormEmail;
use App\Models\Client;
use Carbon\Carbon;
use SoDe\Extend\Fetch;
use SoDe\Extend\Text;

class LandingController extends Controller
{
    public function storeAplicativos(Request $request)
    {
        $reglasValidacion = [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|integer|max:99999999999',
        ];
        $mensajes = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.integer' => 'El campo teléfono debe ser un número entero.',
        ];
        $request->validate($reglasValidacion, $mensajes);
        $formlanding = Landing::create($request->all());
        LandingController::envioCorreo($formlanding);
        // return redirect()->route('landingaplicativos', $formlanding)->with('mensaje','Mensaje enviado exitoso')->with('name', $request->nombre);
        return response()->json(['message' => 'Mensaje enviado con exito']);
    }

    public function storeLanding(Request $request)
    {
        $reglasValidacion = [
            'contact_name' => 'required|string|max:255',
            'contact_email' => 'required|email|max:255',
            'contact_phone' => 'required|integer|max:99999999999',
        ];
        $mensajes = [
            'contact_name.required' => 'El campo nombre es obligatorio.',
            'contact_name.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'contact_email.required' => 'El campo correo electrónico es obligatorio.',
            'contact_email.email' => 'El formato del correo electrónico no es válido.',
            'contact_email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
            'contact_phone.required' => 'El campo teléfono es obligatorio.',
            'contact_phone.integer' => 'El campo teléfono debe ser un número entero.',
        ];
        $request->validate($reglasValidacion, $mensajes);
        $landingData = $request->all();
        $ipAddress = $request->ip();
        $carbon = Carbon::now('America/Lima');
        $landingData['date'] = $carbon->toDateString();
        $landingData['time'] = $carbon->toTimeString();
        $landingData['created_at'] = $carbon->toDateTimeString();
        $landingData['status_id'] = 10;
        $landingData['origin'] = '[Mundo Web] - Landing WebSite';
        $landingData['ip'] = $ipAddress;

        if (empty($landingData['name'])) {
            $landingData['name'] = $landingData['contact_name'];
        }
        if (empty($landingData['web_url'])) {
            $landingData['web_url'] = 'https://';
        }
        if (empty($landingData['sector '])) {
            $landingData['sector '] = 'Rubro desconocido';
        }

        $formlanding = Client::create($landingData);

        SendLandingFormEmail::dispatchAfterResponse($formlanding);

        // LandingController::envioCorreo($formlanding);

        // LandingController::envioCorreoMundo($formlanding);
        // return redirect()->route('landingmundoweb', $formlanding)->with('mensaje','Mensaje enviado exitoso')->with('name', $request->nombre);
        return response()->json(['message' => 'Mensaje enviado con exito']);
    }
    public function storeEcommerce(Request $request)
    {
        $reglasValidacion = [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|integer|max:99999999999',
        ];
        $mensajes = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.integer' => 'El campo teléfono debe ser un número entero.',
        ];
        $request->validate($reglasValidacion, $mensajes);
        $formlanding = Landing::create($request->all());
        LandingController::envioCorreo($formlanding);
        // return redirect()->route('landingecommerce', $formlanding)->with('mensaje','Mensaje enviado exitoso')->with('name', $request->nombre);
        return response()->json(['message' => 'Mensaje enviado con exito']);
    }
    public function storeWebsite(Request $request)
    {
        $reglasValidacion = [
            'nombre' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'telefono' => 'required|integer|max:99999999999',
        ];
        $mensajes = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'nombre.max' => 'El campo nombre no puede tener más de :max caracteres.',
            'email.required' => 'El campo correo electrónico es obligatorio.',
            'email.email' => 'El formato del correo electrónico no es válido.',
            'email.max' => 'El campo correo electrónico no puede tener más de :max caracteres.',
            'telefono.required' => 'El campo teléfono es obligatorio.',
            'telefono.integer' => 'El campo teléfono debe ser un número entero.',
        ];
        $request->validate($reglasValidacion, $mensajes);
        $formlanding = Landing::create($request->all());
        LandingController::envioCorreo($formlanding);
        // return redirect()->route('landingwebsite', $formlanding)->with('mensaje','Mensaje enviado exitoso')->with('name', $request->nombre);
        return response()->json(['message' => 'Mensaje enviado con exito']);
    }
    static function envioCorreo($data)
    {
        $name = $data['contact_name'];
        $mail = EmailConfig::config($name); /* variable $name que se agregó */
        try {
            $html =
                '
            <html lang="en">
                <head>
                    <meta charset="UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <title>Mundo web</title>
                    <link rel="preconnect" href="https://fonts.googleapis.com" />
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                    <link
                        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                        rel="stylesheet"
                    />
                    <style>
                        * {
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                        }

                        @font-face {
                            font-family: grotesk;
                            src: url(../../public/fonts/PPRightGroteskCompactMedium.woff);
                            font-weight: normal;
                        }
                    </style>
                </head>
                <body>
                    <main>
                        <table
                            style="
                                width: 600px;
                                margin: 0 auto;
                                text-align: center;
                                background-image: url(https://mundoweb.pe/mail/Fondo.png);
                                background-repeat: no-repeat;
                                background-position: center;
                                background-size: cover;
                            "
                        >
                            <thead>
                                <tr>
                                    <th
                                        style="
                                            display: flex;
                                            flex-direction: row;
                                            justify-content: center;
                                            align-items: center;
                                            margin: 100px;
                                        "
                                    >
                                        <img src="https://mundoweb.pe/mail/Frame_14466.png" alt="mundo web" />
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p
                                            style="
                                            color: #050a41;
                                            font-weight: 500;
                                            font-size: 18px;
                                            text-align: center;
                                            width: 500px;
                                            margin: 0 auto;
                                            padding: 20px 0;
                                            font-family: Montserrat, sans-serif;
                                        "
                                        >
                                             <span style="display:block">Hola </span>
                                            
                                            
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p
                                            style="
                                                color: #e15a29;
                                                font-size: 40px;
                                                line-height: 40px;
                                                font-family: Montserrat, sans-serif;
                                            "
                                        >
                                             <span style="display:block">' . $name . ' </span>
                                            
                                            
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p
                                            style="
                                                color: #e15a29;
                                                font-size: 40px;
                                                line-height: 70px;
                                                font-family: Montserrat, sans-serif;
                                            "
                                        >
                                            ¡Gracias
                                            <span style="color: #050a41"
                                                >por escribirnos! 🚀</span
                                            >
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p
                                            style="
                                                color: #050a41;
                                                font-weight: 500;
                                                font-size: 18px;
                                                text-align: center;
                                                width: 500px;
                                                margin: 0 auto;
                                                padding: 20px 0;
                                                font-family: Montserrat, sans-serif;
                                            "
                                        >
                                        
                                            En breve nuestra ejecutiva comercial se estará comunicando contigo.
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                <td>
                                    <a href="https://mundoweb.pe/" style="
                                        text-decoration: none;
                                        background-color: #e15a29;
                                        color: white;
                                        border-radius: 40px;
                                        padding: 12px 20px;
                                        display: inline-flex;
                                        justify-content: center;
                                        align-items: center;
                                        gap: 10px;
                                        font-weight: 600;
                                        font-family: Montserrat, sans-serif;
                                    ">
                                        <span>Haz que tu negocio despegue</span>
                                        <img  src="https://mundoweb.pe/mail/buttonmailing.png" style="
                                            width: 20px;
                                            margin-left: 15px;
                                            height: 20px;
                                        " />
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td style="text-align: right; padding-right: 30px;">
                                    <img src="https://mundoweb.pe/mail/10_rgb.png" alt="mundo web" style="width: 80%; margin-top: 100px" />
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </main>
                </body>

            </html>
            ';
            $mail->addAddress($data['contact_email']);
            $mail->Body = $html;
            $mail->isHTML(true);
            $mail->send();

            new Fetch(env('WA_URL') . '/api/send', [
                'method' => 'POST',
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'body' => [
                    'from' => 'atalaya',
                    'to' => [
                        $data['country_prefix'] . $data['contact_phone']
                    ],
                    'html' => $html
                ]
            ]);

            sleep(5);

            $message = SettingController::get('whatsapp-new-lead-notification-message-client');

            foreach ($data->toArray() as $key => $value) {
                $message = str_replace('{{' . $key . '}}', $value, $message);
            }

            new Fetch(env('WA_URL') . '/api/send', [
                'method' => 'POST',
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'body' => [
                    'from' => 'atalaya',
                    'to' => [
                        $data['country_prefix'] . $data['contact_phone']
                    ],
                    'content' => UtilController::html2wa($message)
                ]
            ]);
        } catch (\Throwable $th) {
            // dump($th);
        }
    }
    static function envioCorreoMundo($data)
    {

        /* $name = $data['nombre']; */
        $name = 'Administrador';
        $mail = EmailConfig::config($name); /* variable $name que se agregó */
        try {
            $mail->addAddress('hola@mundoweb.pe');
            $mail->Body = '<html lang="en">
                <head>
                    <meta charset="UTF-8" />
                    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
                    <title>Mundo web</title>
                    <link rel="preconnect" href="https://fonts.googleapis.com" />
                    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
                    <link
                        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
                        rel="stylesheet"
                    />
                    <style>
                        * {
                            margin: 0;
                            padding: 0;
                            box-sizing: border-box;
                        }

                        @font-face {
                            font-family: grotesk;
                            src: url(../../public/fonts/PPRightGroteskCompactMedium.woff);
                            font-weight: normal;
                        }
                    </style>
                </head>
                <body>
                    <main>
                        <table
                            style="
                                width: 600px;
                                margin: 0 auto;
                                text-align: center;
                                background-image: url(https://mundoweb.pe/mail/Fondo.png);
                                background-repeat: no-repeat;
                                background-position: center;
                                background-size: cover;
                            "
                        >
                            <thead>
                                <tr>
                                    <th
                                        style="
                                            display: flex;
                                            flex-direction: row;
                                            justify-content: center;
                                            align-items: center;
                                            margin: 100px;
                                        "
                                    >
                                        <img src="https://mundoweb.pe/mail/Frame_14466.png" alt="mundo web" />
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>
                                        <p
                                            style="
                                            color: #050a41;
                                            font-weight: 500;
                                            font-size: 18px;
                                            text-align: center;
                                            width: 500px;
                                            margin: 0 auto;
                                            padding: 20px 0;
                                            font-family: Montserrat, sans-serif;
                                        "
                                        >
                                             <span style="display:block">Hola </span>
                                            
                                            
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p
                                            style="
                                                color: #e15a29;
                                                font-size: 40px;
                                                line-height: 20px;
                                                font-family: Montserrat, sans-serif;
                                            "
                                        >
                                             <span style="display:block">' . $name . ' </span>
                                            
                                            
                                        </p>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <p
                                            style="
                                                color: #e15a29;
                                                font-size: 40px;
                                                line-height: 70px;
                                                font-family: Montserrat, sans-serif;
                                            "
                                        >
                                            ¡Tienes
                                            <span style="color: #050a41"
                                                >un nuevo mensaje! 🚀</span
                                            >
                                        </p>
                                    </td>
                                </tr>
                                
                <tr>
                <td>
                    <a href="https://mundoweb.pe/" style="
                        text-decoration: none;
                        background-color: #e15a29;
                        color: white;
                        border-radius: 40px;
                        padding: 12px 20px;
                        display: inline-flex;
                        justify-content: center;
                        align-items: center;
                        gap: 10px;
                        font-weight: 600;
                        font-family: Montserrat, sans-serif;
                    ">
                        <span>Haz que tu negocio despegue</span>
                        <img  src="https://mundoweb.pe/mail/buttonmailing.png" style="
                            width: 20px;
                            margin-left: 15px;
                            height: 20px;
                        " />
                    </a>
                </td>
                </tr>
                <tr>
                    <td style="text-align: right; padding-right: 30px;">
                        <img src="https://mundoweb.pe/mail/10_rgb.png" alt="mundo web" style="width: 80%; margin-top: 100px" />
                    </td>
                </tr>
                </tbody>
                </table>
                </main>
                </body>

            </html>';
            $mail->isHTML(true);
            $mail->send();


            $message = SettingController::get('whatsapp-new-lead-notification-message');
            $destinatary = Text::keep(SettingController::get('whatsapp-new-lead-notification-waid'), '0123456789@gc.us');

            foreach ($data->toArray() as $key => $value) {
                $message = str_replace('{{' . $key . '}}', $value, $message);
            }

            new Fetch(env('WA_URL') . '/api/send', [
                'method' => 'POST',
                'headers' => [
                    'Accept' => 'application/json',
                    'Content-Type' => 'application/json'
                ],
                'body' => [
                    'from' => 'atalaya',
                    'to' => [$destinatary],
                    'content' => UtilController::html2wa($message)
                ]
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }
}
