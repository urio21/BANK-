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
Route::get('/', [MeterValidationController::class, 'index']);

Route::post('/meter_validation', [MeterValidationController::class, 'validateMeterInformation'])->name('meter_validation');

Route::get('/display', function () {
        return view('bank.validation');
    })->name('validation');
Route::get('/notification', function () {
    return view('bank.notification');
})->name('notification');
