<?php

namespace App\Http\Controllers;

use App\Http\Classes\EmailConfig;
use App\Models\UsersByServicesByBusiness;
use App\Http\Requests\StoreUsersByServicesByBusinessRequest;
use App\Http\Requests\UpdateUsersByServicesByBusinessRequest;
use App\Models\Constant;
use App\Models\ServicesByBusiness;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use SoDe\Extend\Crypto;
use SoDe\Extend\Response;

class UsersByServicesByBusinessController extends BasicController
{
  public $model = UsersByServicesByBusiness::class;
  public $softDeletion = false;

  public function inviteUser(Request $request)
  {
    $response = Response::simpleTryCatch(function (Response $res) use ($request) {
      $userJpa = User::where('email', $request->email)
        ->where('status', true)
        ->first();
      if (!$userJpa) throw new Exception('El usuario no existe o se encuentra inactivo');
      $serviceByBusinessJpa = ServicesByBusiness::with('service', 'business')
        ->where('id', $request->match)
        ->where('created_by', Auth::user()->id)
        ->first();
      if (!$serviceByBusinessJpa) throw new Exception('El servicio no existe o no tienes permisos para vincular');

      $ubsbb = UsersByServicesByBusiness::updateOrCreate([
        'user_id' => $userJpa->id,
        'service_by_business_id' => $serviceByBusinessJpa->id
      ], [
        'user_id' => $userJpa->id,
        'service_by_business_id' => $serviceByBusinessJpa->id,
        'created_by' => Auth::user()->id,
        'invitation_token' => Crypto::randomUUID(),
        'invitation_accepted' => Auth::user()->id == $userJpa->id
      ]);

      if ($ubsbb->invitation_accepted) return;

      $content = Constant::value('accept-invitation');
      $content = str_replace('{SENDER}', Auth::user()->name, $content);
      $content = str_replace('{SERVICE}', $serviceByBusinessJpa->service->name, $content);
      $content = str_replace('{BUSINESS}', $serviceByBusinessJpa->business->name, $content);
      $content = str_replace('{URL_CONFIRM}', env('APP_URL') . '/invitation/' . $ubsbb->invitation_token, $content);

      $mailer = EmailConfig::config();
      $mailer->Subject = 'Confirmacion - Atalaya';
      $mailer->Body = $content;
      $mailer->addAddress($userJpa->email);
      $mailer->isHTML(true);
      $mailer->send();

      $res->message = 'Se ha enviado una invitacion al usuario ' . $userJpa->name;
    });

    return \response(
      $response->toArray(),
      $response->status
    );
  }

  public function acceptInvitation(Request $request, $token)
  {
    try {
      $ubsbb = UsersByServicesByBusiness::with(['service', 'business', 'user'])
        ->where('invitation_token', $token)
        ->first();
      if (!$ubsbb) throw new Exception('No tienes invitaciones pendientes');
      $ubsbb->invitation_accepted = true;
      $ubsbb->invitation_token = null;
      $ubsbb->active = true;
      $ubsbb->save();

      $message = "Aceptaste la invitacion a administrar el servicio {$ubsbb->service->name} de la empresa {$ubsbb->business->name}";

      // Start user session
      Auth::login($ubsbb->user);

      // Redirect to service domain with message
      return redirect()->away(
        "https://{$ubsbb->service->correlative}." . env('APP_DOMAIN') . 
        "?message=" . rawurlencode($message)
      );

    } catch (\Throwable $th) {
      return redirect()->away("https://" . env('APP_DOMAIN') . "?message=" . rawurlencode($th->getMessage()));
    }
  }

  public function activeService(Request $request)
  {
    $response = Response::simpleTryCatch(function (Response $res) use ($request) {
      $ubsbb = UsersByServicesByBusiness::with(['service'])
        ->select(['users_by_services_by_businesses.*'])
        ->join('services_by_businesses', 'services_by_businesses.id', 'users_by_services_by_businesses.service_by_business_id')
        ->join('services', 'services.id', 'services_by_businesses.service_id')
        ->join('businesses', 'businesses.id', 'services_by_businesses.business_id')
        ->where('user_id', Auth::user()->id)
        ->where('services.correlative', $request->service)
        ->where('businesses.uuid', $request->business)
        ->first();
      if (!$ubsbb) throw new Exception('No tienes permisos para este servicio');

      UsersByServicesByBusiness::join('services_by_businesses', 'services_by_businesses.id', 'users_by_services_by_businesses.service_by_business_id')
        ->where('users_by_services_by_businesses.user_id', Auth::user()->id)
        ->where('services_by_businesses.service_id', $ubsbb->service->id)
        ->update([
          'active' => false
        ]);

      $ubsbb->active = true;
      $ubsbb->save();

      $res->message = 'En breve seras redirigido a ' . $ubsbb->service->name;
    });
    return response($response->toArray(), $response->status);
  }
}
