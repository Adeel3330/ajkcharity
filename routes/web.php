<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\{
    HomeControoler,
};


Route::get('/', function () {
    return view('first');
});
Route::get('/',function(){
    return view('UserSignUp');
})->name('signup');
Route::prefix('admin')->group(function () {
    Route::get('/login', function () {
        return view('admin.login');
    });
    
    Route::get('/',[HomeControoler::class, 'index']);
});
     