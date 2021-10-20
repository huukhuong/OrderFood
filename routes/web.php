<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return view('admin.home');
    });
});

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('client.welcome');
    });
});
