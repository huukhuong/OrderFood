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
    Route::get('404', function() {
        return view('admin.404');
    });

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

    Route::prefix('/order')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListOrder']);
        Route::get('/details/{id}',  [AdminController::class, 'getDetailOrder']);
        Route::get('/edit/{id}',  [AdminController::class, 'getEditOrder']);
        Route::post('/savepartner',  [AdminController::class, 'postSavePartners']);
        Route::post('/edit',  [AdminController::class, 'postEditOrder']);

    });

    Route::prefix('/user')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListUser']);
        Route::get('/edit/{id}',  [AdminController::class, 'getEditUser']);
        Route::get('/block/{id}',  [AdminController::class, 'blockUser']);
        Route::get('/resetpasswd/{id}',  [AdminController::class, 'resetPass']);
    });
    Route::prefix('/partners')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListPartners']);
        Route::get('/add',  [AdminController::class, 'getAddPartners']);
        Route::post('/add',  [AdminController::class, 'postAddPartners']);
        Route::get('/edit/{id}',  [AdminController::class, 'getEditUser']);
        Route::get('/block/{id}',  [AdminController::class, 'blockUser']);
        Route::get('/resetpasswd/{id}',  [AdminController::class, 'resetPass']);
    });
    Route::prefix('/statistical')->group(function () {
        Route::get('/khoangthoigian',  [AdminController::class, 'khoangthoigian']);
        Route::get('/doanhthutheoloai',  [AdminController::class, 'doanhthutheoloai']);
        Route::get('/topsanpham',  [AdminController::class, 'topsanpham']);
        Route::post('/thongke1',  [AdminController::class, 'thongke1']);
    });
});

Route::prefix('/')->group(function () {
    Route::get('/',  [HomeControlller::class, 'index']);
    Route::get('shop',  [HomeControlller::class, 'shop']);
    Route::get('addtocart/{id}',  [HomeControlller::class, 'addToCart']);
    Route::post('updatecart',  [HomeControlller::class, 'updateCart']);
    Route::get('deletecart/{id}',  [HomeControlller::class, 'deleteCart']);
    Route::get('register',  [HomeControlller::class, 'register']);
    Route::get('login',  [HomeControlller::class, 'login']);
    Route::get('cart',  [HomeControlller::class, 'cart']);

    Route::get('product_detail/{id}',  [HomeControlller::class, 'detailProduct']);

    Route::post('register',  [UserController::class, 'postRegister']);
    Route::post('login',  [UserController::class, 'postLogin']);
    Route::get('logout',  [UserController::class, 'logout']);
    Route::get('order',  [HomeControlller::class, 'order']);
    Route::get('order_success',  [HomeControlller::class, 'orderSuccess']);

    Route::get('coming-soon',  function() {
        return view('client.coming-soon');
    });
    Route::post('search',[HomeControlller::class,'search']);

});
