<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\ContactoController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\DataUsageController;
use App\Http\Controllers\FormController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TermsController;
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

Route::get('/', [LandingController::class, 'reactView'])->name('Landing.jsx');
Route::get('/login', [AuthController::class, 'loginView'])->name('Login.jsx');
Route::get('/register', [AuthController::class, 'registerView'])->name('Register.jsx');
Route::get('/recovery', [RecoveryController::class, 'reactView'])->name('Recovery.jsx');
Route::get('/confirm-email/{token}', [AuthController::class, 'confirmEmailView'])->name('ConfirmEmail.jsx');

Route::get('/confirmation/{token}', [AuthController::class, 'loginView']);
Route::get('/invitation/{token}', [UsersByServicesByBusinessController::class, 'acceptInvitation']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [BasicController::class, 'reactView'])->name('Home.jsx');
    Route::get('/businesses', [BusinessController::class, 'reactView'])->name('Businesses.jsx');
    Route::get('/services', [ServiceController::class, 'reactView'])->name('Services.jsx');

    Route::get('/profile', [ProfileController::class, 'reactView'])->name('Profile.jsx');
    Route::get('/account', [AccountController::class, 'reactView'])->name('Account.jsx');
});

Route::get('/terms', [TermsController::class, 'reactView'])->name('Terms.jsx');
Route::get('/data-usage', [DataUsageController::class, 'reactView'])->name('DataUsage.jsx');
