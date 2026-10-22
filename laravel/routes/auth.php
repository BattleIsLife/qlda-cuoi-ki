<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

// Route xử lý đăng nhập, đăng ký user
Route::controller(AuthController::class)->middleware('check.user.guest')->group(function(){
    // Trang đăng nhập
    Route::get('/login', 'showLogin')->name('user.login');
    Route::post('/login', 'login');

    // Trang đăng ký
    Route::get('/register', 'showRegister')->name('user.register');
    Route::post('/register', 'register');
});