<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::post('/login_post', [AuthController::class, 'loginPost']);

Route::get('/registro', [AuthController::class, 'registro']);
Route::post('/registro_post', [AuthController::class, 'registroPost']);
Route::get('/olvidar_pw', [AuthController::class, 'olvidarPW']);

Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);
});

