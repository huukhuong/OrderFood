<?php

use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/', function () {
        return 'admin';
    });
});

Route::prefix('/')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
});