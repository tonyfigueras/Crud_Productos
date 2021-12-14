<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [\App\Http\Controllers\ProductosController::class, 'home'])->name('home');
Auth::routes();
Route::resource('/productos', \App\Http\Controllers\ProductosController::class);
Route::resource('/comentarios', \App\Http\Controllers\ComentariosController::class);