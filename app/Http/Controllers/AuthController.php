<?php

namespace App\Http\Controllers;

use App\Http\Classes\dxResponse;
use App\Http\Classes\EmailConfig;
use App\Http\Services\ReCaptchaService;
use App\Models\Business;
use App\Models\Constant;
use App\Models\InvitationEmail;
use App\Models\User;
use App\Models\Person;
use App\Models\PreUser;
use App\Models\Service;
use App\Models\ServicesByBusiness;
use App\Models\UsersByServicesByBusiness;
use App\Providers\RouteServiceProvider;
use Database\Seeders\ServiceSeeder;
use Exception;
use Illuminate\Contracts\Routing\ResponseFactory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response as HttpResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Inertia\Inertia;
use SoDe\Extend\Crypto;
use SoDe\Extend\File;
use SoDe\Extend\JSON;
use SoDe\Extend\Response;
use SoDe\Extend\Trace;

class AuthController extends BasicController
{

  public function sendCode(Request $request)
  {
    $response = Response::simpleTryCatch(function ($response) use ($request) {
      $userExists = User::where('email', $request->email)->exists();
      if ($userExists) {
        $response->summary = ['type' => 'email'];
        throw new Exception('El correo electronico ya se encuentra registrado');
      }
      $isValid = MailingController::isValid($request->email);
      if (!$isValid) {
        $response->summary = ['type' => 'email'];
        throw new Exception('El correo electronico no es valido');
      }

      // Generate confirmation code
      $confirmationCode = rand(100000, 999999);

      // Store code in session
      $request->session()->put('confirmation_code', [
        'code' => $confirmationCode,
        'email' => $request->email,
        'expires_at' => now()->addMinutes(10)
      ]);

      MailingController::simpleNotify('mailing.email-code', $request->email, [
        'title' => 'Código de Confirmación - Atalaya',
        'code' => $confirmationCode
      ]);

      return true;
    });
    return response($response->toArray(), $response->status);
  }
  public function verifyEmail(Request $request)
  {
    $response = Response::simpleTryCatch(function () use ($request) {
      // Get stored confirmation code data from session
      $confirmationData = $request->session()->get('confirmation_code');

      if (!$confirmationData) {
        throw new Exception('No hay código de confirmación pendiente');
      }

      // Check if code has expired
      if (now()->isAfter($confirmationData['expires_at'])) {
        $request->session()->forget('confirmation_code');
        throw new Exception('El código ha expirado');
      }

      // Verify the code matches
      if ($request->code != $confirmationData['code']) {
        throw new Exception('El código ingresado no es válido');
      }

      // Code is valid
      return true;
    });
    return response($response->toArray(), $response->status);
  }

  public function check(Request $request)
  {
    $response = dxResponse::simpleTryCatch(function ($response) use ($request) {
      $userExists = User::where('email', $request->email)->exists();
      if ($userExists) {
        $response->summary = ['type' => 'email'];
        throw new Exception('El correo electronico ya se encuentra registrado');
      }
      $isValid = MailingController::isValid($request->email);
      if (!$isValid) {
        $response->summary = ['type' => 'email'];
        throw new Exception('El correo electronico no es valido');
      }
      if (Controller::decode($request->password) != Controller::decode($request->passwordConfirm)) {
        $response->summary = ['type' => 'password'];
        throw new Exception('Las contraseñas deben ser iguales');
      }
      return true;
    });
    return response($response->toArray(), $response->status);
  }

  public function register(Request $request)
  {
    $response = Response::simpleTryCatch(function ($response) use ($request) {
      $service = basename($request->header('referer'));
      // Check if user exists
      $userExistsJpa = User::where('email', $request->email)->exists();
      if ($userExistsJpa) {
        $response->summary = ['type' => 'email'];
        throw new Exception('El correo electronico ya se encuentra registrado');
      }

      $isValid = MailingController::isValid($request->email);
      if (!$isValid) {
        $response->summary = ['type' => 'email'];
        throw new Exception('El correo electronico no es valido');
      }

      if (Controller::decode($request->password) != Controller::decode($request->passwordConfirm)) {
        $response->summary = ['type' => 'password'];
        throw new Exception('Las contraseñas deben ser iguales');
      }

      // Start transaction
      DB::beginTransaction();
      try {
        // Create or get existing natural person
        $naturalPersonJpa = Person::where([
          'document_type' => $request->documentType,
          'document_number' => $request->documentNumber
        ])->first();

        if (!$naturalPersonJpa) {
          $naturalPersonJpa = Person::create([
            'document_type' => $request->documentType,
            'document_number' => $request->documentNumber,
            'name' => $request->name,
            'lastname' => $request->lastname,
            'phone_prefix' => $request->phonePrefix,
            'phone' => $request->phone
          ]);
        }

        // Create user
        $userJpa = User::create([
          'name' => $request->name,
          'lastname' => $request->lastname,
          'email' => $request->email,
          'password' => Controller::decode($request->password),
          'person_id' => $naturalPersonJpa->id,
          'relative_id' => Crypto::randomUUID()
        ]);

        // Assign default role
        $userJpa->assignRole('Admin');

        // Check if business already exists
        $existingBusiness = Business::query()
          ->join('people', 'people.id', '=', 'businesses.person_id')
          ->where('people.document_type', 'RUC')
          ->where('people.document_number', $request->ruc)
          ->first();

        if ($existingBusiness && $existingBusiness->created_by) {
          throw new Exception('Esta empresa ya está siendo administrada por otro usuario');
        }

        // Create or get existing legal person
        $legalPersonJpa = Person::updateOrCreate(
          [
            'document_type' => 'RUC',
            'document_number' => $request->ruc
          ],
          [
            'name' => $request->commercialName,
            'lastname' => $request->businessName,
            'phone_prefix' => $request->phonePrefix,
            'phone' => $request->phone,
            'address' => $request->address,
            'created_by' => $userJpa->id
          ]
        );

        // Create company if it doesn't exist or update if exists without created_by
        $businessJpa = Business::updateOrCreate(
          [
            'person_id' => $legalPersonJpa->id,
          ],
          [
            'uuid' => Crypto::randomUUID(),
            'name' => $request->commercialName,
            'owner_id' => $naturalPersonJpa->id,
            'contact_id' => $naturalPersonJpa->id,
            'created_by' => $userJpa->id,
          ]
        );

        $matchJpa = ServicesByBusiness::create([
          'business_id' => $businessJpa->id,
          'service_id' => Service::query()->where('correlative', $service)->first()->id,
          'created_by' => $userJpa->id,
        ]);

        UsersByServicesByBusiness::create([
          'user_id' => $userJpa->id,
          'service_by_business_id' => $matchJpa->id,
          'created_by' => $userJpa->id,
          'invitation_accepted' => true,
          'active' => true
        ]);

        // Create session for new user
        Auth::login($userJpa);

        DB::commit();

        return $service;
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
    });
    return response($response->toArray(), $response->status);
  }

  public function loginView(Request $request, ?string $confirmation = null)
  {
    if (Auth::check()) return redirect('/home');

    if ($confirmation) {
      try {
        //code...
        $preUserJpa = PreUser::select()
          ->with('person')
          ->where('confirmation_token', $confirmation)
          ->first();
        if (!$preUserJpa) return redirect('/login');

        $userJpa = User::where('person_id', $preUserJpa->person_id)->exists();
        if ($userJpa) $message = 'Este correo ya ha sido verificado anteriormente.';
        else {
          User::create([
            'name' => explode(' ', $preUserJpa->person->name)[0],
            'lastname' => explode(' ', $preUserJpa->person->lastname)[0],
            'email' => $preUserJpa->email,
            'email_verified_at' => Trace::getDate('mysql'),
            'password' => $preUserJpa->password,
            'person_id' => $preUserJpa->person_id,
            'birthdate' => $preUserJpa->birthdate,
            'relative_id' => Crypto::randomUUID()
          ])->assignRole('Admin');
          $message = 'La confirmacion se ha realizado con exito';
        }
        $preUserJpa->delete();
        return redirect('/login?message=' . $message);
      } catch (\Throwable $th) {
        return redirect('/login');
      }
    }

    return Inertia::render('Login', [
      'APP_PROTOCOL' => env('APP_PROTOCOL', 'https'),
      'APP_DOMAIN' => env('APP_DOMAIN'),
      'PUBLIC_RSA_KEY' => Controller::$PUBLIC_RSA_KEY,
      'message' => $message ?? null
    ])->rootView('auth');
  }

  public function joinView(Request $request, ?string $correlative = null)
  {
    if (Auth::check()) return redirect('/home');

    $columns = ['name', 'correlative', 'description', 'status'];
    $service = null;

    if ($correlative != null) {
      $service = Service::select($columns)
        ->where('correlative', $correlative)
        ->where('status', true)
        ->first();
      if (!$service) return redirect('/');
    }

    $services = Service::select($columns)->get();
    $prefixes = JSON::parse(File::get('./phone_prefixes.json'));

    return Inertia::render('Join', [
      ...$this->basicProperties,
      'RECAPTCHA_SITE_KEY' => env('RECAPTCHA_SITE_KEY'),
      'terms' => Constant::value('terms'),
      'prefixes' => $prefixes,
      'correlative' => $correlative,
      'authView' => $correlative ? 'account' : 'login',
      'services' => $services,
      'service' => $service
    ])->rootView('public');
  }

  public function registerView(Request $request)
  {
    if (Auth::check()) {
      Auth::logout();
    }

    $prefixes = JSON::parse(File::get('./phone_prefixes.json'));
    $invitation = InvitationEmail::where('invitation_token', $request->token)->first();

    if (!$invitation) return redirect('/');

    return Inertia::render('Register', array_merge($this->getBasicProperties(), [
      'APP_PROTOCOL' => env('APP_PROTOCOL', 'https'),
      'PUBLIC_RSA_KEY' => Controller::$PUBLIC_RSA_KEY,
      'RECAPTCHA_SITE_KEY' => env('RECAPTCHA_SITE_KEY'),
      'terms' => Constant::value('terms'),
      'prefixes' => $prefixes,
      'invitation' => $invitation
    ]))->rootView('public');
  }

  public function confirmEmailView(Request $request, string $token)
  {
    if (Auth::check()) return redirect('/home');

    $preUserJpa = PreUser::where('token', $token)->first();
    if (!$preUserJpa) return redirect('/login');

    return Inertia::render('ConfirmEmail', [
      'email' => $preUserJpa->email
    ])->rootView('auth');
  }

  /**
   * Handle an incoming authentication request.
   */
  public function login(Request $request): HttpResponse | ResponseFactory | RedirectResponse
  {
    $response = Response::simpleTryCatch(function () use ($request) {
      $email = $request->email;
      $password = $request->password;

      if (!Auth::attempt([
        'email' => Controller::decode($email),
        'password' => Controller::decode($password)
      ])) {
        throw new Exception('Credenciales invalidas');
      }

      $request->session()->regenerate();

      $ubsbb = UsersByServicesByBusiness::with(['service'])
        ->select(['users_by_services_by_businesses.*'])
        ->join('services_by_businesses', 'services_by_businesses.id', 'users_by_services_by_businesses.service_by_business_id')
        ->join('services', 'services.id', 'services_by_businesses.service_id')
        ->join('businesses', 'businesses.id', 'services_by_businesses.business_id')
        ->where('user_id', Auth::user()->id)
        ->where('services.status', true)
        // ->where('active', true)
        ->first();

      if (!$ubsbb) {
        $userJpa = User::find(Auth::id());
        if ($userJpa->hasRole('Root')) {
          return 'main';
        }
        Auth::logout();
        return null;
      }
      return $ubsbb->service->correlative;
    });

    return response($response->toArray(), $response->status);
  }

  public function signup(Request $request): HttpResponse | ResponseFactory | RedirectResponse
  {
    $response = new Response();
    try {
      $request->validate([
        'document_type' => 'required|string|max:3|min:2',
        'document_number' => 'required|string|max:9|min:8',
        'name' => 'required|string|max:255',
        'lastname' => 'required|string|max:255',
        'password' => 'required|string',
        'confirmation' => 'required|string',
        // 'captcha' => 'required|string',
        // 'terms' => 'required|accepted'
      ]);

      $token = basename($request->header('referer'));
      $invitation = InvitationEmail::with(['service'])
        ->where('invitation_token', $token)
        ->first();
      if (!$invitation) throw new Exception('Token invalido');

      $body = $request->all();

      if (!isset($request->password) || !isset($request->confirmation)) throw new Exception('Debes ingresar una contraseña para el nuevo usuario');
      if (Controller::decode($request->password) != Controller::decode($request->confirmation)) throw new Exception('Las contraseñas deben ser iguales');

      // if (!ReCaptchaService::verify($request->captcha)) throw new Exception('Captcha invalido. Seguro que no eres un robot?');

      DB::beginTransaction();
      try {
        $personJpa = Person::select()
          ->where('document_type', $body['document_type'])
          ->where('document_number', $body['document_number'])
          ->first();

        if (!$personJpa) {
          $personJpa = Person::create([
            'document_type' => $body['document_type'],
            'document_number' => $body['document_number'],
            'name' => $body['name'],
            'lastname' => $body['lastname'],
            'phone_prefix' => $body['phone_prefix'],
            'phone' => $body['phone'],
          ]);
        }

        // $existsUser = User::where('person_id', $personJpa->id)->exists();
        // if ($existsUser) throw new Exception('Ya existe un usuario registrado con ese documento');

        // Create user directly
        $userJpa = User::create([
          'name' => $body['name'],
          'lastname' => $body['lastname'],
          'email' => $invitation->email,
          'password' => Controller::decode($body['password']),
          'person_id' => $personJpa->id,
          'email_verified_at' => now(),
          'relative_id' => Crypto::randomUUID()
        ]);

        // Assign default role
        $userJpa->assignRole('Admin');

        // Create UserByServiceByBusiness with invitation data
        UsersByServicesByBusiness::create([
          'user_id' => $userJpa->id,
          'service_by_business_id' => $invitation->service_by_business_id,
          'active' => true,
          'created_by' => $invitation->created_by,
          'invitation_accepted' => true
        ]);

        $invitation->delete();

        DB::commit();

        // Log in the user and redirect
        Auth::login($userJpa);

        $response->status = 200;
        $response->message = 'Usuario registrado correctamente';
        $response->data = $invitation->service->correlative;
      } catch (\Exception $e) {
        DB::rollback();
        throw $e;
      }
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();
    } finally {
      return response(
        $response->toArray(),
        $response->status
      );
    }
  }

  /**
   * Destroy an authenticated session.
   */
  public function destroy(Request $request)
  {
    $response = new Response();
    try {
      Auth::guard('web')->logout();

      $request->session()->invalidate();
      $request->session()->regenerateToken();

      $response->status = 200;
      $response->message = 'Cierre de sesion exitoso';
    } catch (\Throwable $th) {
      $response->status = 400;
      $response->message = $th->getMessage();
    } finally {
      return response(
        $response->toArray(),
        $response->status
      );
    }
  }
}
