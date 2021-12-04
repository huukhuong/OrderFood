<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
Route::prefix('admin')->group(function () {
    Route::get('/',  [AdminController::class,'index']);
    Route::prefix('/category')->group(function () {
        Route::get('/list',  [AdminController::class,'getlistcategory']);
        Route::get('/add',  [AdminController::class,'getaddcategory']);
        Route::post('add',[AdminController::class,'postaddcategory']);
        Route::get('/edit/{id}',  [AdminController::class,'geteditcategory']);
        Route::post('/edit',  [AdminController::class,'posteditcategory']);
        Route::get('/delete/{id}',  [AdminController::class,'deletecategory']);
    });

});

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('client.welcome');
    });
});

