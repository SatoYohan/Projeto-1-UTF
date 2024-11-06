<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::resource('locais', LocalController::class);
Route::resource('leituras', LeituraController::class);
