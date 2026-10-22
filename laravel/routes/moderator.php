<?php

use App\Http\Controllers\Moderator\ModeratorAuthController;
use App\Http\Controllers\Moderator\ManagmentController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Moderator\PostController;

// Route moderator
Route::prefix('admin')->group(function(){
    // Đăng nhập, đăng xuất moderator
    Route::controller(ModeratorAuthController::class)->group(function(){
        Route::get('/login', 'showLogin')->middleware('check.user.guest')->name('admin.login');
        Route::post('/login', 'login')->middleware('check.user.guest');
        
        Route::post('/logout', 'logout')->middleware('check.moderator.login')->name('admin.logout');
    });

    Route::middleware('check.moderator.login')->group(function(){
        Route::controller(ManagmentController::class)->group(function(){
            // Dashboard
            Route::get('/dashboard', 'dashboard')->name('admin.dashboard');


            // User moderator
            // Userlist
            Route::get('/user_list', 'user_list')->name('admin.user_list');
            Route::put('/user_block/{user_id}', 'block_user');

            // Fiction list
            Route::get('/fiction_list', 'fiction_list')->name('admin.fiction_list');

            // Series list
            Route::get('/series_list', 'series_list')->name('admin.series_list');

            // AJAX xóa
            Route::delete('/delete_series/{series_id}', 'delete_series');
            Route::delete('/delete_fiction/{fiction_id}', 'delete_fiction');
            Route::delete('/delete_chapter/{chapter_id}', 'delete_chapter');
            Route::delete('/delete_comment/{comment_id}', 'delete_comment');


            // Moderator list (for admin)
            Route::get('/moderator_list', 'moderator_list')->name('admin.moderator_list');
            Route::put('/change_permission/{mod_id}', 'change_mod_permission');

            // Tạo tài khoản moderator
            Route::get('/register', 'showRegister')->name('admin.register');
            Route::post('/register', 'register');

            // Thay đổi thông tin
            Route::get('/change_info', 'showChangeInfo')->name('admin.change_info');
            Route::put('/change_info', 'change_info');

            // Vô hiệu/khổi phục tài khoản của moderator
            Route::post('/toggle_moderator/{moderator_id}', 'toggleModeratorDelete');

            // API lấy thông tin moderator
            Route::post('/get_moderator_info/{mod_id}', 'getModerator');

            // APIT lấy thông tin user
            Route::post('/get_user_info/{id}', 'get_user_info');
        });


       Route::controller(PostController::class)->group(function(){
            Route::get('/post_list', 'showAllPost')->name('admin.post_list');
            Route::get('/new_post', 'showNewPost')->name('admin.new_post');
            Route::post('/new_post', 'new_post');
            Route::get('/edit_post/{post_id}', 'showEditPost')->name('admin.edit_post');
            Route::post('/edit_post/{post_id}', 'edit_post');
            Route::delete('/delete_post/{post_id}', 'delete_post');
            Route::delete('/delete_post_comment/{comment_id}', 'delete_post_comment');
        });
    });
});