<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){
    // Trang chủ
    Route::get('/', 'index')->name('home');
    Route::get('/home', 'index');

    // About me
    Route::get('/about_me', 'about_me')->name('about_me');
});

