<?php

use App\Http\Controllers\ImportController;
use App\Http\Controllers\ImportDetailsController;
use App\Http\Controllers\OrderDetails;
use App\Http\Controllers\SupplierController;
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
        Route::get('/search',  [AdminController::class, 'searchProduct']);
        Route::get('/getDetails/{id}',[AdminController::class,'getProduct']);
        Route::get('/getProductBySupplier/{id}',[AdminController::class,'getProductBySupplier']);
    });


    Route::prefix('/supplier')->group(function () {
        Route::get('/list',  [SupplierController::class, 'getListSupplier']);
        Route::get('/add',  [SupplierController::class, 'getAddSupplier']);
        Route::post('add', [SupplierController::class, 'postAddSupplier']);
        Route::get('/edit/{id}',  [SupplierController::class, 'getEditSupplier']);
        Route::post('/edit',  [SupplierController::class, 'postEditSupplier']);
        Route::get('/delete/{id}',  [SupplierController::class, 'deleteSupplier']);
        Route::get('/search',  [SupplierController::class, 'searchSupplier']);
    });

    Route::prefix('/order')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListOrder']);
        Route::get('/add',  [AdminController::class, 'getAddOrder']);
        Route::post('/add',  [AdminController::class, 'postAddOrder']);
        Route::get('/details/{id}',  [AdminController::class, 'getDetailOrder']);
        Route::get('/edit/{id}',  [AdminController::class, 'getEditOrder']);
        Route::post('/savepartner',  [AdminController::class, 'postSavePartners']);
        Route::post('/edit',  [AdminController::class, 'postEditOrder']);
        Route::get('/search',  [AdminController::class, 'searchOrders']);
        Route::get('/print/{id}',[AdminController::class,'getPrint']);

    });

    Route::prefix('/import')->group(function () {
        Route::get('/list',  [ImportController::class, 'getListImport']);
        Route::get('/add',  [ImportController::class, 'getAddImport']);
        Route::post('/add',  [ImportController::class, 'postAddImport']);
        Route::get('/details/{id}',  [ImportController::class, 'getDetailImport']);
        Route::get('/edit/{id}',  [ImportController::class, 'getEditImport']);
        Route::post('/savepartner',  [ImportController::class, 'postSavePartners']);
        Route::post('/edit',  [ImportController::class, 'postEditImport']);
        Route::get('/search',  [ImportController::class, 'searchImports']);
        Route::get('/print/{id}',[ImportController::class,'getPrint']);

    });

    Route::prefix('/importdetails')->group(function () {
        Route::get('/list',  [ImportController::class, 'getListImport']);
        Route::post('/add',  [ImportDetailsController::class, 'postAddDetails']);
        Route::get('/details/{id}',  [ImportController::class, 'getDetailImport']);
        Route::get('/edit/importID={id1}&productID={id2}',  [ImportDetailsController::class, 'getEditDetail']);
        Route::post('/savepartner',  [ImportController::class, 'postSavePartners']);
        Route::post('/edit',  [ImportDetailsController::class, 'postEditDetails']);
        Route::get('/delete/importID={id1}&productID={id2}',  [ImportDetailsController::class, 'getDelete']);
    });

    Route::prefix('/orderdetails')->group(function () {
        Route::post('/add', [OrderDetails::class, 'postAddOrderDetails']);
        Route::get('/list',  [OrderDetails::class, 'getListOrder']);
      //  Route::get('/edit/{id}',  [OrderDetails::class, 'getEditOrderDetails']);
        Route::post('/savepartner',  [OrderDetails::class, 'postSavePartners']);
        Route::post('/edit',  [OrderDetails::class, 'postEditOrderDetails']);
       // Route::post('/edit/orderID={id1}&productID={id2}',  [OrderDetails::class, 'postEditOrderDetails']);
        Route::get('/edit/orderID={id1}&productID={id2}',  [OrderDetails::class, 'getEditOrderDetails']);
        Route::get('/delete/orderID={id1}&productID={id2}',  [OrderDetails::class, 'getDelete']);

    });

    Route::prefix('/user')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListUser']);
        Route::get('/edit/{id}',  [AdminController::class, 'getEditUser']);
        Route::post('/edit',  [AdminController::class, 'postEditUser']);
        Route::get('/add',  [AdminController::class, 'getAddUser']);
        Route::post('/add',  [AdminController::class, 'postAddUser']);
        Route::get('/block/{id}',  [AdminController::class, 'blockUser']);
        Route::get('/resetpasswd/{id}',  [AdminController::class, 'resetPass']);
    });

    Route::prefix('/partners')->group(function () {
        Route::get('/list',  [AdminController::class, 'getListPartners']);
        Route::get('/add', function() {
            return view('admin.404');
        });
        Route::get('/edit/{id}', function() {
            return view('admin.404');
        });
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
    Route::get('cart_details/{id}',  [HomeControlller::class, 'cartDetails']);
    Route::post('deleteCarts', [HomeControlller::class, 'deleteCarts']);
    Route::get('register',  [HomeControlller::class, 'register']);
    Route::get('login',  [HomeControlller::class, 'login']);
    Route::get('cart',  [HomeControlller::class, 'cart']);

    Route::get('product_detail/{id}',  [HomeControlller::class, 'detailProduct']);

    Route::post('register',  [UserController::class, 'postRegister']);
    Route::post('login',  [UserController::class, 'postLogin']);
    Route::get('logout',  [UserController::class, 'logout']);
    Route::get('order',  [HomeControlller::class, 'order']);
    Route::get('orderDelete/{id}',[HomeControlller::class,'orderDelete']);
    Route::get('orderCancel/{id}',[HomeControlller::class,'orderCancel']);
    Route::post('order_success',  [HomeControlller::class, 'orderSuccess']);
    Route::get('order_success',  function (){
        return view('client.order_success',['page' => 'page']);
    });
    Route::get('coming-soon',  function() {
        return view('client.coming-soon');
    });
    Route::get('search',[HomeControlller::class,'search']);
});
