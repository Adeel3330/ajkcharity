<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\admin\ApiController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// Get Districts
Route::get('get-provincesRecord/{provinceId}',[ApiController::class, 'getDistricts']);
// Get Tehsils   get-tehsils
Route::get('get-tehsils/{districtId}',[ApiController::class, 'getTehsils']);




