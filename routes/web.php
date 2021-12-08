<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Client\HomeControlller;
use App\Http\Controllers\Client\UserController;

Route::get('/admin/login',  [AdminController::class, 'login'])->name('login');
Route::post('/admin/login',  [AdminController::class, 'postLogin']);

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function () {

    Route::get('/',  [AdminController::class, 'index']);
    Route::get('/logout', [AdminController::class, 'logout']);


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
    Route::get('cart',  [HomeControlller::class, 'cart']);

    Route::post('register',  [UserController::class, 'postRegister']);
    Route::post('login',  [UserController::class, 'postLogin']);
    Route::get('logout',  [UserController::class, 'logout']);
<<<<<<< HEAD
=======
    Route::get('order',  [HomeControlller::class, 'order']);

>>>>>>> 1e23f156d0591b8ef991d973fe06943beea76f60
    Route::get('coming-soon',  function() {
        return view('client.coming-soon');
    });
    Route::post('search',[HomeControlller::class,'search']);

});
