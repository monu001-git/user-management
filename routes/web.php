<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\bannerController;
use App\Http\Controllers\contentController;
use App\Http\Controllers\menuController;
use App\Http\Controllers\orgController;
use App\Http\Controllers\commonController;
use App\Http\Controllers\faqController;
use App\Http\Controllers\galleryController;
use App\Http\Controllers\mainController;
use App\Http\Controllers\teamController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\specialitiesController;



Auth::routes();

Route::group(['middleware' => ['auth']], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('banners', bannerController::class);
    Route::resource('menus', menuController::class);
    Route::resource('orgs', orgController::class);
    Route::resource('contents', contentController::class);
    Route::resource('gallery', galleryController::class);
    Route::resource('teams', teamController::class);
    Route::resource('specialities',specialitiesController ::class);
    Route::resource('faqs',faqController ::class);
    Route::get('delete-gallery-detail', [galleryController::class, 'deleteItem'])->name('delete-item');
    Route::get('delete-gallery-content', [contentController::class, 'deleteItem'])->name('delete-item');

    Route::controller(commonController::class)->group(function () {
        Route::get('status-change/{status?}/{id?}/{db?}', 'StatusChange');
    });


});



    
Route::get('send-mail', [MailController::class, 'index']);

Route::get('/', [mainController::class, 'home']);
Route::post('/appointment-book',[mainController::class,'appoinment_book']);
Route::get('/{slug1}/{slug2?}', [mainController::class, 'getAllPageContent']);
