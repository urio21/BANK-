<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\authorapi\v1\AuthorController;
use App\Http\Controllers\Api\V1\TaskController;
use App\Http\Controllers\Api\V1\UpdateTaskController;
use App\Http\Controllers\Api\V1\CompleteTaskController;

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

Route::prefix('v1')->group(function () {
    Route::apiResource('/tasks', TaskController::class);  //Here we define restful routes for our api/controllers
    Route::patch('/tasks/{task}/complete', CompleteTaskController::class);
    Route::put('/tasks/{task}', UpdateTaskController::class);
});

Route::prefix('v1')->group(function () {
    Route::apiResource('/authors', AuthorController::class);
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

