<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PartiesTypeController;
use App\Http\Controllers\GSTBillsController;
use App\Http\Controllers\MiCuentaController;
use App\Http\Controllers\ConfiguracionController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'login']);
Route::post('/login_post', [AuthController::class, 'loginPost']);

Route::get('/registro', [AuthController::class, 'registro']);
Route::post('/registro_post', [AuthController::class, 'registroPost']);
Route::get('/olvidar_pw', [AuthController::class, 'olvidarPW']);
Route::post('/olvidar_pw_post', [AuthController::class, 'olvidarPW_post']);


Route::group(['middleware' => 'admin'], function(){
    Route::get('admin/dashboard', [DashboardController::class, 'dashboard']);

    Route::get('admin/parties_type', [PartiesTypeController::class, 'parties_type']);
    Route::get('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_add']);
    Route::post('admin/parties_type/add', [PartiesTypeController::class, 'parties_type_insert']);
    Route::get('admin/parties_type/edit/{id}', [PartiesTypeController::class, 'parties_type_edit']);
    Route::post('admin/parties_type/edit/{id}', [PartiesTypeController::class, 'parties_type_update']);
    Route::get('admin/parties_type/delete/{id}', [PartiesTypeController::class, 'parties_type_delete']);
    Route::get('admin/parties_type/pdf_generator', [PartiesTypeController::class, 'parties_type_generar_pdf']);

    Route::get('admin/parties', [PartiesTypeController::class, 'parties']);
    Route::get('admin/parties/add', [PartiesTypeController::class, 'parties_add']);
    Route::post('admin/parties/add', [PartiesTypeController::class, 'parties_insertar']);
    Route::get('admin/parties/pdf', [PartiesTypeController::class, 'parties_pdf_descargar']);
    Route::get('admin/parties/pdf_single/{id}', [PartiesTypeController::class, 
    'parties_pdf_single_descargar']);


    Route::get('admin/gst_bills', [GSTBillsController::class, 'gst_bills']);
    Route::get('admin/gst_bills/add', [GSTBillsController::class, 'gst_insertar']);
    Route::post('admin/gst_bills/add', [GSTBillsController::class, 'gst_bills_insertar']);
    Route::get('admin/gst_bills/edit/{id}', [GSTBillsController::class, 'gst_bills_edit']);
    Route::post('admin/gst_bills/edit/{id}', [GSTBillsController::class, 'gst_bills_update']);
    Route::get('admin/gst_bills/delete/{id}', [GSTBillsController::class, 'gst_bills_delete']);
    Route::get('admin/gst_bills/view/{id}', [GSTBillsController::class, 'gst_bills_view']);

    Route::get('admin/mi_cuenta', [MiCuentaController::class, 'mi_cuenta']);
    Route::post('admin/mi_cuenta/update', [MiCuentaController::class, 'mi_cuenta_update']);

    Route::get('admin/configuracion', [ConfiguracionController::class, 'configuracion']);
    Route::post('admin/configuracion/update', [ConfiguracionController::class, 'configuracion_update']);






});

Route::get('/logout', [AuthController::class, 'logout']);

