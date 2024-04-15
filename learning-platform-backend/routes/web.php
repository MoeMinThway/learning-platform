<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard/{role?}',[AccountController::class,'accountLists'])->name('dashboard');
    Route::get('accountDetails/{id}',[AccountController::class,'accountDetails'])->name('account#details');
    Route::get('account/create',[AccountController::class,'createPage'])->name('account#createPage');
    Route::post('account/create',[AccountController::class,'create'])->name('account#create');



});
