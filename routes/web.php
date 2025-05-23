<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
//front
use App\Http\Controllers\{
    RegisterController,
};
//admin
use App\Http\Controllers\admin\{
    DemographyController,
    HomeController,
    TypeController,
    UserController,
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
    Route::get('/users',[UserController::class,'userindex'])->name('users');
    //GroupIndex
    Route::get('/types',[TypeController::class,'index'])->name('types');
    //ItemIndex
    Route::get('/items', [TypeController::class, 'items'])->name('items');
   
    Route::get('/group-create', [TypeController::class, 'create'])->name('group.create');
    // Route::get('/item-create', [TypeController::class, 'createItem'])->name('item.create');
    Route::put('/group-update',[TypeController::class, 'update'])->name('update');
    Route::post('/group-create',[TypeController::class,'store'])->name('group.store');
    Route::get('/group-edit/{type}', [TypeController::class, 'edit'])->name('group.edit');
    Route::put('/group-edit/{type}', [TypeController::class, 'update'])->name('group.update');

    Route::delete('/group-delete/{type}',[TypeController::class,'destroy'])->name('group.destroy');

    //DropDownItem
    Route::get('/item/create', [TypeController::class, 'ItemCreate'])->name('item.create');
    Route::post('/item/store', [TypeController::class, 'ItemStore'])->name('item.store');
    Route::get('/item/edit/{type}', [TypeController::class, 'ItemEdit'])->name('item.edit');
    Route::put('/item/update/{type}', [TypeController::class, 'ItemUpdate'])->name('item.update');
    Route::delete('/item-delete/{type}', [TypeController::class, 'ItemDestroy'])->name('item.destroy');

    //DemoGraphy
    //DemographyIndex
    Route::get('/demography',[DemographyController::class,'index'])->name('demography');
    Route::get('/demography/create',[DemographyController::class,'create'])->name('demography.create');
    Route::post('/demography/store',[DemographyController::class,'store'])->name('demography.store');
    Route::get('/demography/edit/{demography}',[DemographyController::class,'edit'])->name('demography.edit');
    Route::put('/demography/update/{demogrphy}',[DemographyController::class,'update'])->name('demography.update');
    Route::delete('/demography/delete/{demogrphy}', [DemographyController::class, 'destroy'])->name('demography.destroy');

    //Registration Index
    Route::get('/get-registration',[RegisterController::class, 'getRegistrations'])->name('getRegistrations');

    Route::get('/show-registrations/{charityRegistration}',[RegisterController::class,'show'])->name('registration.show');
});

require __DIR__.'/auth.php';

