<?php

use App\Http\Middleware\Authenticate;
use App\Http\Middleware\PreventBackHistory;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


Route::get('/', function () {
    return view('landingpage');
})->name('landingpage')->middleware(PreventBackHistory::class);

Route::get('/mybooks', function () {
    return view('mybooks');
})->middleware(PreventBackHistory::class)->middleware(Authenticate::class)->name('mybooks');
Route::post('/register', [UserController::class, 'register'])->name('register');
Route::post('/logout', [UserController::class, 'logout'])->name('logout');
Route::post(uri: '/login', action: [UserController::class, 'login'])->name(name: 'login');