<?php

use App\Http\Controllers\IngresosController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RolController;
use App\Http\Controllers\TipoIngresoController;
use App\Http\Controllers\UserController;


Route::group(['middleware'=> ['auth']],function () {
    Route::resource('/ingresos', IngresosController::class)->names('admin.ingresos');
    Route::resource('/roles', RolController::class)->names('admin.roles');
    Route::resource('/users', UserController::class)->names('admin.users');
    Route::resource('/tipo-ingresos', TipoIngresoController::class)->names('admin.tipo-ingresos');
});