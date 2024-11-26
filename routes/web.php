<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [WelcomeController::class, 'index']);

Route::group(['middleware' => 'guest'], function () {
  Route::get('/register', [AuthController::class, 'register'])->name('register');
  Route::post('/register', [AuthController::class, 'registerPost'])->name('register');
  Route::get('/login', [AuthController::class, 'login'])->name('login');
  Route::post('/login', [AuthController::class, 'loginPost'])->name('login');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/user/home', [HomeController::class, 'index']);

    Route::get('/user/events', [EventController::class, 'index']);
    Route::get('/user/events/create', [EventController::class, 'create']);
    Route::post('/user/events/store', [EventController::class, 'store']);
    Route::get('/user/events/edit/{event}', [EventController::class, 'edit']);
    Route::put('/user/events/update/{event}', [EventController::class, 'update']);
    Route::delete('/user/events/destroy/{event}', [EventController::class, 'destroy']);

    Route::delete('/logout', [AuthController::class, 'logout'])->name('logout');
});
