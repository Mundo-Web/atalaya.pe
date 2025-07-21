<?php

namespace App\Http\Controllers;

use App\Http\Classes\EmailConfig;
use Illuminate\Support\Facades\View;
use SMTPValidateEmail\Validator;

class MailingController extends Controller
{
    static function isValid(string $email)
    {
        $dominio = substr(strrchr($email, "@"), 1);
        if (!checkdnsrr($dominio, "MX")) return false;

        $validator = new Validator();
        $result = $validator->validate([$email], env('MAIL_FROM_ADDRESS'));

        return $result[$email];
    }
    static function simpleNotify(string $view, string $email, array $data, array $ccs = [])
    {
        try {
            $data =  \array_merge(
                $data
            );
            $content = View::make($view, $data)->render();

            $mail = EmailConfig::config();
            $mail->Subject = $data['title'] ?? 'Hola que tal?';
            $mail->isHTML(true);
            $mail->Body = $content;
            $mail->addAddress($email);
            foreach ($ccs as $cc) {
                $mail->addCC($cc);
            }
            $mail->send();
        } catch (\Throwable $th) {
            if (\env('APP_ENV') == 'local') {
                dump($th->getMessage());
            }
        }
    }
}
