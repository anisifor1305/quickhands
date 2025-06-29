<?php

use App\Http\Controllers\AdvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FLPubController;
use App\Http\Controllers\MainPageController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAuthed;
use App\Models\Advert;
use Illuminate\Support\Facades\Route;

Route::get('/', [MainPageController::class, 'index'])->middleware(isAuthed::class);
Route::get('/auth', [AuthController::class, 'form']);
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/reg', [RegistrationController::class, 'registration']);
Route::post('/reg', [RegistrationController::class, 'createUser']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(isAuthed::class);
Route::get('/adverts', [AdvController::class, 'getAdvs'])->middleware(isAuthed::class);
Route::get('/users/{id}', [UserController::class, 'showProfile'])->middleware(isAuthed::class);
Route::get('/employer', [EmployerController::class, 'index'])->middleware(isAuthed::class);
Route::get('/adverts/new', [AdvController::class, 'index'])->middleware(isAuthed::class);

Route::post('/adverts/new', [AdvController::class, 'newAdv'])->middleware(isAuthed::class);
Route::get('/adverts/{id}', [AdvController::class, 'showAdv'])->middleware(isAuthed::class);
Route::get('/freelancers', [FLPubController::class, 'getFLPubs'])->middleware(isAuthed::class);
Route::get('/freelancers/new', [FLPubController::class, 'index'])->middleware(isAuthed::class);
Route::post('/freelancers/new', [FLPubController::class, 'newFLPub'])->middleware(isAuthed::class);
Route::get('/freelancers/{id}', [FLPubController::class, 'showFLPub'])->middleware(isAuthed::class);