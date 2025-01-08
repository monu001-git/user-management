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
use App\Http\Controllers\mainController;

Route::get('/',[mainController::class,'home']);
  
Auth::routes();
  
Route::get('/home', [HomeController::class, 'index'])->name('home');
  
Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('banners', bannerController::class);
    Route::resource('menus', menuController::class);
    Route::resource('orgs', orgController::class);
    Route::resource('contents', contentController::class);

Route::controller(commonController::class)->group(function () {
    Route::get('status-change/{status?}/{id?}/{db?}', 'StatusChange');
});

});
