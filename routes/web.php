<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\Authenticate;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

//Get Routes
Route::get('/', function () {
    return view('landingpage');
})->name('landingpage')->middleware(PreventBackHistory::class);

Route::get('/mybooks', [ProfileController::class, 'showMyBooksHeader'])
    ->middleware(PreventBackHistory::class)
    ->middleware(Authenticate::class)
    ->name('mybooks');

Route::get('/userbooks', [ProfileController::class, 'showUserBooksHeader'])
    ->middleware(PreventBackHistory::class)
    ->middleware(Authenticate::class)
    ->name('userbooks');

//Post Routes
Route::post('/register', [UserController::class, 'register'])
    ->name('register');
Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout');
Route::post(uri: '/login', action: [UserController::class, 'login'])
    ->name(name: 'login');
Route::post('/addbooks', [BookController::class, 'store'])
    ->name('addbooks');
