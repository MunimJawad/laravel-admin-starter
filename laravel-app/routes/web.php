<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('guest')->group(function(){
  Route::get('/register', [AuthController::class, 'showRegister'])->name('register.form');
  Route::post('/register', [AuthController::class, 'register'])->name('register');
});

Route::middleware('auth')->group(function(){
  Route::get('/test', function () {
   echo "Hello World";
})->name('test');

});



