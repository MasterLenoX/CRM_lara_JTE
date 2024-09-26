<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::prefix('auth')->name('auth.')->group(function(){

    Route::middleware(['guest:web'])->group(function(){
        Route::view('/login', 'backend.pages.auth.login')->name('login');
        Route::view('/forgot-password','backend.pages.auth.forgot')->name('forgot-password');
    });

    Route::middleware([])->group(function(){
        Route::view('/home',[AuthController::class, 'index'])->name('home');
    });
});