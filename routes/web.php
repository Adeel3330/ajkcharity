<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('first');
});
Route::get('/',function(){
    return view('UserSignUp');
})->name('signup');
     