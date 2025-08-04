<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BasicController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessSignController;
use App\Http\Controllers\DataUsageController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RecoveryController;
use App\Http\Controllers\Root\BusinessController as RootBusinessController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TermsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersByServicesByBusinessController;
use Illuminate\Support\Facades\Route;

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

Route::redirect('/login', '/join');
Route::get('/', [LandingController::class, 'reactView'])->name('Landing.jsx');
// Route::get('/login', [AuthController::class, 'loginView'])->name('Login.jsx');
Route::get('/join/{service?}', [AuthController::class, 'joinView'])->name('Join.jsx');
Route::get('/register/{token}', [AuthController::class, 'registerView'])->name('Register.jsx');
Route::get('/recovery', [RecoveryController::class, 'reactView'])->name('Recovery.jsx');
Route::get('/confirm-email/{token}', [AuthController::class, 'confirmEmailView'])->name('ConfirmEmail.jsx');

Route::get('/confirmation/{token}', [AuthController::class, 'loginView']);
Route::get('/invitation/{token}', [UsersByServicesByBusinessController::class, 'acceptInvitation']);

Route::middleware('auth')->group(function () {
    Route::get('/home', [BasicController::class, 'reactView'])->name('Home.jsx');
    Route::get('/businesses', [BusinessController::class, 'reactView'])->name('Businesses.jsx');
    Route::get('/signs', [BusinessSignController::class, 'reactView'])->name('Signs.jsx');
    Route::get('/users', [UserController::class, 'reactView'])->name('Users.jsx');
    Route::get('/services', [ServiceController::class, 'reactView'])->name('Services.jsx');

    Route::get('/profile', [ProfileController::class, 'reactView'])->name('Profile.jsx');
    Route::get('/account', [AccountController::class, 'reactView'])->name('Account.jsx');

    Route::get('/all-businesses', [RootBusinessController::class, 'reactView'])->name('Root/Businesses.jsx');
    Route::get('/all-users', [UserController::class, 'reactView'])->name('Root/Users.jsx');
});

Route::get('/terms', [TermsController::class, 'reactView'])->name('Terms.jsx');
Route::get('/data-usage', [DataUsageController::class, 'reactView'])->name('DataUsage.jsx');

if (env('APP_ENV') == 'local') {
    Route::get('/repository/signs/{uuid}', [BusinessSignController::class, 'media']);
}
