<?php

use App\Http\Controllers\EmpleadoController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::redirect('/', 'login');

Route::resource('empleado', EmpleadoController::class )->middleware('auth');

Auth::routes(['register'=>false,'reset'=>false]);

Route::group(['middleware' => 'auth'],function () {
    Route::get('/', [EmpleadoController::class, 'index'])->name('home');
});