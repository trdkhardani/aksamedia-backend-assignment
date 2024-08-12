<?php

use App\Http\Controllers\Api\Auth\LoginController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\DivisionController;
use App\Http\Controllers\Api\Employee\CreateEmployeeController;
use App\Http\Controllers\Api\Employee\DeleteEmployeeController;
use App\Http\Controllers\Api\Employee\ReadEmployeeController;
use App\Http\Controllers\Api\Employee\UpdateEmployeeController;
use Illuminate\Http\Request;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login',[ LoginController::class, 'authenticate']);

Route::middleware('auth:sanctum')->group(function(){
    Route::get('/divisions',[ DivisionController::class, 'index']);
    Route::get('/employees',[ ReadEmployeeController::class, 'index']);
    Route::post('/employees',[ CreateEmployeeController::class, 'index']);
    Route::put('/employees/{employee_id}',[ UpdateEmployeeController::class, 'index']);
    Route::delete('/employees/{employee_id}',[ DeleteEmployeeController::class, 'index']);

    Route::post('/logout', [LogoutController::class, 'logout']);
});
