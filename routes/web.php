<?php

use Illuminate\Support\Facades\Route;

// frontsite
use App\Http\Controllers\Frontsite\LandingController;
use App\Http\Controllers\Frontsite\AppointmentController;
use App\Http\Controllers\Frontsite\PaymentController;
use App\Http\Controllers\Frontsite\RegisterController;

// backsite
use App\Http\Controllers\Backsite\DashboardController;
// use App\Http\Controllers\Backsite\PermissionController;
// use App\Http\Controllers\Backsite\RoleController;
// use App\Http\Controllers\Backsite\UserController;
// use App\Http\Controllers\Backsite\TypeUserController;
// use App\Http\Controllers\Backsite\SpecialistController;
// use App\Http\Controllers\Backsite\ConfigPaymentController;
// use App\Http\Controllers\Backsite\ConsultationController;
// use App\Http\Controllers\Backsite\DoctorController;
// use App\Http\Controllers\Backsite\HospitalPatientController;
// use App\Http\Controllers\Backsite\ReportAppointmentController;
// use App\Http\Controllers\Backsite\ReportTransactionController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::resource('/', LandingController::class);

Route::group(['middleware' => ['auth:sanctum', 'verified']], function () {

    Route::resource('appointment', AppointmentController::class);

    Route::get('payment/success', [PaymentController::class, 'success'])->name('payment.success');
    Route::resource('payment', PaymentController::class);
    
    Route::resource('register_success', RegisterController::class);
});

Route::group(['prefix' => 'backsite', 'as' => 'backsite.', 'middleware' => ['auth:sanctum', 'verified']], function () {

    Route::resource('dashboard', DashboardController::class);
    

});
