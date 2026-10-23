<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Author\AuthorSeriesController;
use App\Http\Controllers\Author\AuthorFictionController;
use App\Http\Controllers\Author\AuthorChapterController;
use App\Http\Controllers\Author\AuthorProfileController;
use Illuminate\Support\Facades\Route;

// Route tác giả
Route::prefix('author')->middleware('check.user.login')->group(function(){
    // Trang thông tin người dùng
    Route::get('/', [ProfileController::class, 'index'])->name('user.profile');
    Route::get('/profile', [ProfileController::class, 'index']);

    // Tác giả yêu thích
    Route::get('/favorite_author', [ProfileController::class, 'favorite_author_list'])->name('user.favorite_author');

    // Truyện
    Route::get('/fiction_list', [AuthorFictionController::class, 'index'])->name('user.fiction_list');

    Route::get('/favorite_fiction', [ProfileController::class, 'favorite_fiction_list'])->name('user.favorite_fiction');

    Route::get('/new_fiction', [AuthorFictionController::class, 'create'])->name('user.new_fiction');
    Route::post('/new_fiction', [AuthorFictionController::class, 'store']);
    Route::get('/edit_fiction/{fictionId}', [AuthorFictionController::class, 'edit'])->name('user.edit_fiction');
    Route::post('/edit_fiction/{fictionId}', [AuthorFictionController::class, 'update']);
    Route::delete('/delete_fiction/{fictionId}', [AuthorFictionController::class, 'delete'])->name('user.delete_fiction');


    // Chương truyện
    // Thêm chương mới
    Route::get('/edit_fiction/{fictionId}/new_chapter', [AuthorChapterController::class, 'create']);
    Route::post('/edit_fiction/{fictionId}/new_chapter', [AuthorChapterController::class, 'store']);
    // Sửa chương
    Route::get('/edit_fiction/{fictionId}/edit_chapter/{chapterId}', [AuthorChapterController::class, 'edit']);
    Route::put('/edit_fiction/{fictionId}/edit_chapter/{chapterId}', [AuthorChapterController::class, 'update']);
    // Xóa chương
    Route::delete('/edit_fiction/{fictionId}/delete_chapter/{chapterId}', [AuthorChapterController::class, 'destroy']);

    // Preview chương truyện
    Route::get('/chapter_preview/{chapterId}', [AuthorChapterController::class, 'preview'])->name('chapter.preview');


    // Series
    // Danh sách series
    Route::get('/series_list', [AuthorSeriesController::class, 'index'])->name('user.series_list');
    Route::get('/favorite_series', [ProfileController::class, 'favorite_series_list'])->name('user.favorite_series');

    // Tạo series
    Route::get('/new_series', [AuthorSeriesController::class, 'create'])->name('user.new_series');
    Route::post('/new_series', [AuthorSeriesController::class, 'create_attempt']);
    // Sửa series
    Route::get('/edit_series/{id}', [AuthorSeriesController::class, 'edit']);
    Route::put('/edit_series/{id}', [AuthorSeriesController::class, 'edit_attempt']);
    // Thêm truyện vào series
    Route::post('/edit_series/{id}/add_fiction', [AuthorSeriesController::class, 'add_fiction_to_series']);
    // Xóa truyện khỏi series
    Route::delete('/edit_series/remove_fiction/{id}', [AuthorSeriesController::class, 'delete_fiction_from_series']);
    // Xóa series
    Route::delete('/delete_series/{id}', [AuthorSeriesController::class, 'delete']);


    // // Đăng xuất tài khoản
    Route::post('/logout', [AuthController::class, 'logout']);


    // Đổi thông tin
    Route::get('/change_info', [AuthController::class, 'change_info'])->name('user.change_info');
    Route::put('/change_info', [AuthController::class, 'change_info_attempt']);


    // Xóa tài khoản
    Route::get('delete_account', [AuthController::class, 'delete_account'])->name('user.delete_account');
    Route::delete('delete_account', [AuthController::class, 'delete_account_attempt']);
});

// Profile của người dùng khác
Route::prefix('view_author')->group(function(){
    // Trang thông tin người dùng
    Route::get('/{author_id}', [AuthorProfileController::class, 'index'])->name('other_user.profile');
    Route::get('/profile/{author_id}', [AuthorProfileController::class, 'index']);

    // Danh sách truyện
    Route::get('/fiction_list/{author_id}', [AuthorProfileController::class, 'fiction_list'])->name('other_user.fiction_list');

    // Danh sách series
    Route::get('/series_list/{author_id}', [AuthorProfileController::class, 'series_list'])->name('other_user.series_list');
});