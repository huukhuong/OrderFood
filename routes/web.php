<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\HomeControlller;

Route::prefix('admin')->group(function () {

    Route::get('/',  [AdminController::class, 'index']);

    Route::prefix('/category')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListCategory']);
        Route::get('/add',  [AdminController::class, 'getAddCategory']);
        Route::post('add', [AdminController::class, 'postAddCategory']);
        Route::get('/edit/{id}',  [AdminController::class, 'getEditCategory']);
        Route::post('/edit',  [AdminController::class, 'postEditCategory']);
        Route::get('/delete/{id}',  [AdminController::class, 'deleteCategory']);
    });

    Route::prefix('/product')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListProduct']);
        Route::get('/add',  [AdminController::class, 'getAddProduct']);
        Route::post('add', [AdminController::class, 'postAddProduct']);
        Route::get('/edit/{id}',  [AdminController::class, 'getEditProduct']);
        Route::post('/edit',  [AdminController::class, 'postEditProduct']);
        Route::get('/delete/{id}',  [AdminController::class, 'deleteProduct']);
    });
});

Route::prefix('/')->group(function () {

    Route::get('/',  [HomeControlller::class, 'index']);
    Route::get('shop',  [HomeControlller::class, 'shop']);
    Route::get('register',  [HomeControlller::class, 'register']);
    Route::get('login',  [HomeControlller::class, 'login']);

    Route::get('coming-soon',  function() {
        return view('client.coming-soon');
    });


});
