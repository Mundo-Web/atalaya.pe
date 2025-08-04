<?php

use App\Http\Controllers\AccountController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BusinessController;
use App\Http\Controllers\BusinessSignController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LandingFormController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RemainingHistoryController;
use App\Http\Controllers\Root\BusinessController as RootBusinessController;
use App\Http\Controllers\ServicesByBusinessController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\StatusController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserByProjectController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsersByServicesByBusinessController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('login', [AuthController::class, 'login']);
Route::post('signup', [AuthController::class, 'signup']);
Route::post('auth/login', [AuthController::class, 'login']);
Route::post('auth/send-code', [AuthController::class, 'sendCode']);
Route::post('auth/verify-email', [AuthController::class, 'verifyEmail']);
Route::post('auth/check', [AuthController::class, 'check']);
Route::post('auth/register', [AuthController::class, 'register']);

Route::middleware('auth')->group(function () {
    Route::delete('logout', [AuthController::class, 'destroy'])
        ->name('logout');

    Route::get('/dashboard/{range}', [DashboardController::class, 'revenue']);

    // Users routes
    Route::post('/users', [UserController::class, 'save']);
    Route::post('/users/paginate', [UserController::class, 'paginate']);
    Route::patch('/users/status', [UserController::class, 'status']);
    Route::delete('/users/{id}', [UserController::class, 'delete']);

    // Roles routes
    Route::get('/roles/user/{id}', [RoleController::class, 'byUser']);
    Route::post('/roles', [RoleController::class, 'save']);
    Route::post('/roles/paginate', [RoleController::class, 'paginate']);
    Route::patch('/roles/status', [RoleController::class, 'status']);
    Route::delete('/roles/{id}', [RoleController::class, 'delete']);

    // Permissions routes
    Route::post('/permissions', [PermissionController::class, 'save']);
    Route::post('/permissions/paginate', [PermissionController::class, 'paginate']);
    Route::get('/permissions/role/{id}', [PermissionController::class, 'byRole']);
    Route::patch('/permissions/role', [PermissionController::class, 'massiveByRole']);
    Route::patch('/permissions/status', [PermissionController::class, 'status']);
    Route::delete('/permissions/{id}', [PermissionController::class, 'delete']);

    // Businesses routes
    Route::post('/business', [BusinessController::class, 'save']);
    Route::put('/business/assign', [BusinessController::class, 'assign']);
    Route::delete('/business/assign', [BusinessController::class, 'assign']);
    Route::post('/business/paginate', [BusinessController::class, 'paginate']);
    Route::patch('/business/status', [BusinessController::class, 'status']);
    Route::patch('/business/client-status', [BusinessController::class, 'clientStatus']);
    Route::delete('/business/{id}', [BusinessController::class, 'delete']);

    // Signs routes
    Route::post('/signs', [BusinessSignController::class, 'save']);
    Route::post('/signs/paginate', [BusinessSignController::class, 'paginate']);
    Route::delete('/signs/{id}', [BusinessSignController::class, 'delete']);

    Route::post('/team/paginate', [TeamController::class, 'paginate']);
    Route::delete('/team/{id}', [TeamController::class, 'delete']);

    // Types routes
    Route::post('/types', [TypeController::class, 'save']);
    Route::post('/types/paginate', [TypeController::class, 'paginate']);
    Route::patch('/types/status', [TypeController::class, 'status']);
    Route::delete('/types/{id}', [TypeController::class, 'delete']);

    // Statuses routes
    Route::post('/statuses', [StatusController::class, 'save']);
    Route::post('/statuses/paginate', [StatusController::class, 'paginate']);
    Route::patch('/statuses/status', [StatusController::class, 'status']);
    Route::delete('/statuses/{id}', [StatusController::class, 'delete']);

    // Projects routes
    Route::post('/projects', [ProjectController::class, 'save']);
    Route::post('/projects/paginate', [ProjectController::class, 'paginate']);
    Route::patch('/projects/status', [ProjectController::class, 'status']);
    Route::patch('/projects/project-status', [ProjectController::class, 'projectStatus']);
    Route::delete('/projects/{id}', [ProjectController::class, 'delete']);

    // Payments routes
    Route::post('/payments', [PaymentController::class, 'save']);
    Route::post('/payments/paginate', [PaymentController::class, 'paginate']);
    Route::get('/payments/project/{id}', [PaymentController::class, 'byProject']);
    Route::patch('/payments/status', [PaymentController::class, 'status']);
    Route::delete('/payments/{id}', [PaymentController::class, 'delete']);

    // Statuses routes
    Route::post('/landing-forms', [LandingFormController::class, 'save']);
    Route::post('/landing-forms/paginate', [LandingFormController::class, 'paginate']);
    Route::patch('/landing-forms/status', [LandingFormController::class, 'status']);
    Route::delete('/landing-forms/{id}', [LandingFormController::class, 'delete']);

    // Statuses routes
    Route::post('/tables', [TableController::class, 'save']);
    Route::post('/tables/paginate', [TableController::class, 'paginate']);
    Route::patch('/tables/status', [TableController::class, 'status']);
    Route::delete('/tables/{id}', [TableController::class, 'delete']);

    Route::get('/profile/{uuid}', [ProfileController::class, 'full'])->withoutMiddleware('throttle');
    Route::get('/profile/thumbnail/{uuid}', [ProfileController::class, 'thumbnail'])->withoutMiddleware('throttle');
    Route::post('/profile', [ProfileController::class, 'saveProfile']);
    Route::patch('/profile', [ProfileController::class, 'save']);

    Route::patch('/account/email', [AccountController::class, 'email']);
    Route::patch('/account/password', [AccountController::class, 'password']);

    // Statuses routes
    Route::post('/settings', [SettingController::class, 'save']);
    Route::post('/settings/paginate', [SettingController::class, 'paginate']);
    Route::patch('/settings/status', [SettingController::class, 'status']);
    Route::delete('/settings/{id}', [SettingController::class, 'delete']);

    Route::get('/remainings-history/{month}', [RemainingHistoryController::class, 'get']);

    Route::get('/users-by-projects/{relative_id}', [UserByProjectController::class, 'getUser']);
    Route::get('/users-by-projects/project/{project}', [UserByProjectController::class, 'byProject']);
    Route::patch('/users-by-projects/project', [UserByProjectController::class, 'massiveByProject']);

    Route::get('/services-by-business/{ruc}', [ServicesByBusinessController::class, 'byBusiness']);
    Route::post('/services-by-business', [ServicesByBusinessController::class, 'enableService']);
    Route::delete('/services-by-business/{id}', [ServicesByBusinessController::class, 'delete']);

    Route::post('/users-by-services-by-business', [UsersByServicesByBusinessController::class, 'inviteUser']);
    Route::delete('/users-by-services-by-business/{id}', [UsersByServicesByBusinessController::class, 'delete']);
    Route::post('/users-by-services-by-business/authorize', [UsersByServicesByBusinessController::class, 'activeService']);

    Route::get('/logo/{uuid}', [BusinessController::class, 'full']);
    Route::get('/logo/thumbnail/{uuid}', [BusinessController::class, 'thumbnail']);

    Route::prefix('root')->group(function () {
        Route::get('/businesses', [RootBusinessController::class, 'paginate']);
        Route::patch('/businesses/status', [RootBusinessController::class, 'status']);
        Route::delete('/businesses/{id}', [RootBusinessController::class, 'delete']);
    });
});
