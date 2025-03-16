<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::get('/registro', [AuthController::class, 'registro']);
Route::get('/olvidar_pw', [AuthController::class, 'olvidarPW']);

