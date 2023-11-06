<?php

use App\Http\Controllers\Bank\MeterValidation\MeterValidationController;
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
Route::get('/', function () {
    return view('bank.home');
})->name('home');

Route::get('customer_payment', [MeterValidationController::class, 'index'])->name('customer_payment');

Route::post('meter_validation', [MeterValidationController::class, 'validateMeterInformation'])->name('meter_validation');

Route::post('generate_token', [MeterValidationController::class, 'confirmGenerateToken'])->name('generate_token');

Route::get('notifications', [MeterValidationController::class, 'getNotifications'])->name('notifications');

Route::get('meter/{meterNumber}/request/{requestId}', [MeterValidationController::class, 'getTokenByMeterNumberAndRequestId'])->name('tokens');

