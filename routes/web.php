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

//Merge With The profile header already working.
Route::get('/all-public-books', [BookController::class, 'getAllPublicBooks']) 
    ->middleware(PreventBackHistory::class)
    ->name('public.books');

Route::get('/mybooks', [ProfileController::class, 'showMyBooksHeader',])
    ->middleware(PreventBackHistory::class)
    ->middleware(Authenticate::class)
    ->name('mybooks');

Route::get('/userbooks', [BookController::class, 'getUserBooks'])
    ->middleware(Authenticate::class)
    ->middleware(PreventBackHistory::class)
    ->name('userbooks');

Route::get('/editaccount', [ProfileController::class, 'showAccountDetails'])
    ->middleware(Authenticate::class)
    ->middleware(PreventBackHistory::class)
    ->name('account');

//Post Routes
Route::post('/register', [UserController::class, 'register'])
    ->name('register');
Route::post('/logout', [UserController::class, 'logout'])
    ->name('logout');
Route::post(uri: '/login', action: [UserController::class, 'login'])
    ->name(name: 'login');
Route::post('/addbooks', [BookController::class, 'store'])
    ->name('addbooks');
Route::post('/update', [UserController::class, 'updateUserDetails'])
    ->name('updateUser');   
