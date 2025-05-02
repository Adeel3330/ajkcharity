<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{
    HomeController,
    AuthController,
};


// Route::get('/login', function () {
//     return view('first');
// });
Route::get('/',function(){
    return view('UserSignUp');
})->name('signup');
Route::get('/login',[AuthController::class, 'login'])->name('login');
Route::prefix('admin')->group(function () {
    Route::get('/',[HomeController::class, 'index']);
});
     