<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\UsersByServicesByBusinessController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', fn (Request $request) => view('home'));
Route::get('/login', [AuthController::class, 'loginView'])->name('Login.jsx');
Route::get('/register', [AuthController::class, 'registerView'])->name('Register.jsx');
Route::get('/confirm-email/{token}', [AuthController::class, 'confirmEmailView'])->name('ConfirmEmail.jsx');

Route::get('/confirmation/{token}', [AuthController::class, 'loginView']);
Route::get('/invitation/{token}', [UsersByServicesByBusinessController::class, 'acceptInvitation']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [BasicController::class, 'reactView'])->name('Home.jsx');
    Route::get('/businesses', [BusinessController::class, 'reactView'])->name('Businesses.jsx');
    Route::get('/services', [ServiceController::class, 'reactView'])->name('Services.jsx');

    Route::get('/profile', [ProfileController::class, 'reactView'])->name('Profile.jsx');
});

// Mundo web
Route::get('/', fn () => view('Homepage'))->name('inicio');
Route::post('/', [FormController::class, 'store5'])->name('formhome');
Route::post('/save/crm', [FormController::class, 'saveInAtalaya'])->name('save.crm');

Route::get('/servicios', fn () => view('Services'))->name('servicios');
Route::get('/servicios/onepage', fn () => view('Onepage'))->name('onepage');
Route::get('/servicios/landing', fn () => view('Landingpage'))->name('landingpage');
Route::get('/servicios/ecommerce', fn () => view('Ecommercepage'))->name('ecommercepage');
Route::get('/servicios/aplicativos', fn () => view('Aplicativospage'))->name('aplicativospage');
Route::post('/servicios/ecommerce', [FormController::class, 'store'])->name('guardarpopup');
Route::post('/servicios/landing', [FormController::class, 'store2'])->name('guardarpopup2');
Route::post('/servicios/onepage', [FormController::class, 'store3'])->name('guardarpopup3');
Route::post('/servicios/aplicativos', [FormController::class, 'store4'])->name('guardarpopup4');

Route::get('/contacto', fn () => view('Contactopage'))->name('contacto');
Route::post('/contacto', [ContactoController::class, 'storeContacto'])->name('guardarcontacto');

Route::get('/proyectos', fn () => view('Proyectos'))->name('proyectos');
Route::get('/blog', [PostController::class, 'index'])->name('posts.index');
Route::get('/blog/{post}', [PostController::class, 'show'])->name('posts.show');

Route::get('/thankyoupage', [FormController::class, 'thankyoupage'])->name('thankyoupage');

Route::get('/landingaplicativos', fn () => view('Landing/Landingaplicativos'))->name('landingaplicativos');
Route::get('/landingmundoweb', fn () => view('Landing/Landingmundoweb'))->name('landingmundoweb');
Route::get('/landingecommerce', fn () => view('Landing/Landingecommerce'))->name('landingecommerce');
Route::get('/landingwebsite', fn () => view('Landing/Landingwebsite'))->name('landingwebsite');
Route::get('/website', fn () => view('Landing/Landingmundowebfinal'))->name('ultimalanding');

Route::post('/landingaplicativos/form', [LandingController::class, 'storeAplicativos'])->name('guardarlandingaplicativos');
Route::post('/landingmundoweb/form', [LandingController::class, 'storeLanding'])->name('guardarlandingmundoweb');
Route::post('/landingecommerce/form', [LandingController::class, 'storeEcommerce'])->name('guardarlandingecommerce');
Route::post('/landingwebsite/form', [LandingController::class, 'storeWebsite'])->name('guardarlandingwebsite');

Route::get('/csrf-token', function () {
    return response()->json(['token' => csrf_token()]);
});
