<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Client\Roles\RoleController;
use App\Http\Controllers\Client\Users\UserController;
use App\Http\Controllers\Client\Tariffs\ManageTariffsController;
use App\Http\Controllers\Client\Customers\ManageCustomersController;
use App\Http\Controllers\Client\Debts\DebtController;
use App\Http\Controllers\Client\UtilityProvider\ManageUtilityProviderController;
use App\Http\Controllers\Client\ProviderCategory\ManageProviderCategoryController;

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
Route::get('/bank', function () {
    return view('bank.customerinput');});

Route::get('/display', function () {
        return view('bank.validation');
    })->name('validation');
    Route::get('/notification', function () {
        return view('bank.notification');
    })->name('notification');
