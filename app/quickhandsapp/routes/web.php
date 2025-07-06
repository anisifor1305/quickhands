<?php

use App\Http\Controllers\AdvController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CPanelController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\FLPubController;
use App\Http\Controllers\HowPageController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\isAdmin;
use App\Http\Middleware\isAuthed;
use App\Models\Advert;
use Illuminate\Support\Facades\Route;


Auth::routes();
Route::get('/', function (){
    return redirect('/home');
})->middleware(isAuthed::class);
Route::get('/home', [HomeController::class, 'index'])->middleware(isAuthed::class);
Route::get('/auth', [AuthController::class, 'form']);
Route::post('/auth', [AuthController::class, 'auth']);
Route::get('/reg', [RegistrationController::class, 'registration']);
Route::post('/reg', [RegistrationController::class, 'createUser']);
Route::get('/logout', [AuthController::class, 'logout'])->middleware(isAuthed::class);
Route::get('/adverts', [AdvController::class, 'getAdvs'])->middleware(isAuthed::class);
Route::get('/users/{id}', [UserController::class, 'showProfile'])->middleware(isAuthed::class);
// Route::get('/employer', [EmployerController::class, 'index'])->middleware(isAuthed::class);
Route::get('/adverts/new', [AdvController::class, 'index'])->middleware(isAuthed::class);

Route::post('/adverts/new', [AdvController::class, 'newAdv'])->middleware(isAuthed::class);
Route::get('/adverts/{id}', [AdvController::class, 'showAdv'])->middleware(isAuthed::class);
Route::get('/freelancers', [FLPubController::class, 'getFLPubs'])->middleware(isAuthed::class);
Route::get('/freelancers/new', [FLPubController::class, 'index'])->middleware(isAuthed::class);
Route::post('/freelancers/new', [FLPubController::class, 'newFLPub'])->middleware(isAuthed::class);
Route::get('/freelancers/{id}', [FLPubController::class, 'showFLPub'])->middleware(isAuthed::class);
Route::get('/cpanel', [CPanelController::class, 'index'])->middleware(isAuthed::class);
Route::get('/howpage', [HowPageController::class, 'index'])->middleware(isAuthed::class);
Route::get('/profile', [UserController::class, 'personalProfile'])->middleware(isAuthed::class);
Route::get('/profile/flpubdelete/{id}', [FLPubController::class, 'deleteFLPub'])->middleware(isAuthed::class);
Route::get('/profile/advdelete/{id}', [AdvController::class, 'deleteAdv'])->middleware(isAuthed::class);
Route::post('/banuser', [UserController::class, 'banUser'])->middleware(isAdmin::class);
Route::post('/unbanuser', [UserController::class, 'unbanUser'])->middleware(isAdmin::class);
Route::get('/banned', function () {
   return view('banned') ;
});


Route::get('/chat', [App\Http\Controllers\ChatController::class, 'index'])->name('chat')->middleware(isAuthed::class);
Route::get('/messages', [ChatController::class, 'messages'])
    ->name('messages'); //ОЧЕНЬ СТРЁМНО
Route::post('/message', [ChatController::class, 'message'])
    ->name('message')->middleware(isAuthed::class);