<?php

use App\Http\Controllers\FictionController;
use App\Http\Controllers\ChapterController;
use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Moderator\PostController;

// Route truy cập bài đăng
Route::get('/post/{post_id}', [PostController::class,'show'])->name('post.detail');


// Route xử lý truyện
Route::controller(FictionController::class)->group(function(){
    // Danh sách và chi tiết truyện
    Route::get('/all_fictions', 'index')->name('all_fictions');
    Route::get('/fiction/{fictionId}', 'show')->name('fiction.detail');
});


// Route xử lý series
Route::controller(SeriesController::class)->group(function(){
    Route::get('/all_series', 'index')->name('all_series');
    Route::get('/series/{seriesId}', 'show')->name('series.detail');
});


// Route xử lý chương
Route::get('/chapter/{chapterId}', [ChapterController::class, 'show'])->name('chapter.detail');