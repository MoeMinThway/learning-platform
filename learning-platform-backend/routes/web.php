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
    Route::get('account/edit/{id}',[AccountController::class,'editPage'])->name('account#editPage');
    Route::post('account/update',[AccountController::class,'edit'])->name('account#update');
    Route::get('account/delete/{id}',[AccountController::class,'delete'])->name('account#delete');
    Route::get('account/changePassword/{id}',[AccountController::class,'changePasswordPage'])->name('account#changePasswordPage');
    Route::post('account/changePassword',[AccountController::class,'changePassword'])->name('account#changePassword');



});
