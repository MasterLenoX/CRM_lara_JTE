<?php

use Illuminate\Support\Facades\Route;

use \App\Http\Controllers\AuthController;


Route::prefix('auth')->name('auth.')->group(function(){

  Route::middleware(['guest:web'])->group(function(){
      Route::view('/login', 'backend.pages.auth.login')->name('login');
      Route::view('/forgot-password','backend.pages.auth.forgot')->name('forgot-password');
  });

  Route::middleware(['auth:web'])->group(function(){
      Route::get('/home',[AuthController::class,'index'])->name('home');
  });
});

?>