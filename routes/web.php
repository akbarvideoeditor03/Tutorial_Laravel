<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\NilaiController;
Route::resource('datanilai', NilaiController::class);

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');