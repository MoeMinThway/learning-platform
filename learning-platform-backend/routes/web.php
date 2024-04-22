<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\KpayController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\CategoryController;

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

    Route::group( ['prefix'=>'category'],function(){
        Route::get('lists',[CategoryController::class,'lists'])->name('category#lists');
        Route::get('edit/page/{id}',[CategoryController::class,'editPage'])->name('category#editPage');
        Route::get('delete/{id}',[CategoryController::class,'delete'])->name('category#delete');
        Route::post('create',[CategoryController::class,'create'])->name('category#create');
        Route::post('update',[CategoryController::class,'update'])->name('category#update');
    });

    Route::group( ['prefix'=>'course'],function(){
        Route::get('lists/{category_id?}',[CourseController::class,'lists'])->name('course#lists');
        Route::get('create/page',[CourseController::class,'createPage'])->name('course#createPage');
        Route::post('create',[CourseController::class,'create'])->name('course#create');
        Route::get('editPage/{id}',[CourseController::class,'editPage'])->name('course#editPage');
        Route::post('update',[CourseController::class,'update'])->name('course#update');
        Route::get('delete/{id}',[CourseController::class,'delete'])->name('course#delete');

        Route::get('ajax/lesson/create',[AjaxController::class,'lessonCreate'])->name('course#lessonCreate');
        Route::get('ajax/lesson/delete',[AjaxController::class,'lessonDelete'])->name('course#lessonCreate');

    });

    Route::group( ['prefix'=>'kpay'],function(){

        Route::get('create/page',[KpayController::class,'createPage'])->name('kpay#createPage');
        Route::get('lists',[KpayController::class,'lists'])->name('kpay#lists');
        Route::post('create',[KpayController::class,'create'])->name('kpay#create');
        Route::get('delete/{id}',[KpayController::class,'delete'])->name('kpay#delete');
        Route::get('editPage/{id}',[KpayController::class,'editPage'])->name('kpay#editPage');
        Route::post('edit',[KpayController::class,'edit'])->name('kpay#edit');
        Route::post('search',[KpayController::class,'search'])->name('kpay#search');

        Route::get('ajax/desc',[AjaxController::class,'desc'])->name('course#desc');



    });






});
