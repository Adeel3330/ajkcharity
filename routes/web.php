<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//front
use App\Http\Controllers\{
    RegisterController,
};
//admin
use App\Http\Controllers\admin\{
    HomeController,
};

Route::get('/',[RegisterController::class,'index'])->name('signup');
Route::post('register-charity',[RegisterController::class,'store'])->name('charity.store');
//////////////////////////////////////////////////////
//////////////////// Admin Routes////////////////////
/////////////////////////////////////////////////////
// Login Route
Route::get('/login', function () {
    return view('admin_login');
})->name('login');
// Admin Authenticated Routes
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard',[HomeController::class, 'index'])->name('dashboard');
});
require __DIR__.'/auth.php';

