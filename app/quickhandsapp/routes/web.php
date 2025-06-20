<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\RegistrationController;
use App\Http\Middleware\isAuthed;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('mainpage');
})->middleware(isAuthed::class);
Route::get('/auth', [AuthController::class, 'form']);
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/reg', [RegistrationController::class, 'registration']);
Route::post('/reg', [RegistrationController::class, 'createUser']);
Route::get('/logout', [AuthController::class, 'logout']);