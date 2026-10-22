<?php

use App\Http\Controllers\InteractionController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

// Route xử lý tương tác AJAX: like truyện/chương, vote bình luận
Route::controller(InteractionController::class)->middleware('check.user.login')->group(function () {
    Route::post('/fiction/{fictionId}/like', 'toggleFictionLike')->name('fiction.like');
    Route::post('/chapter/{chapterId}/like', 'toggleChapterLike')->name('chapter.like');
    Route::post('/series/{seriesId}/like', 'toggleSeriesLike')->name('series.like');
    Route::post('/author/{seriesId}/like', 'toggleAuthorLike')->name('author.like');
    Route::post('/chapter_comments/{commentId}/vote', 'voteChapterComment')->name('chapter_comments.vote');
    Route::post('/moderator_post_comments/{commentId}/vote', 'voteModeratorPostComment')->name('moderator_post_comments.vote');
});

Route::controller(CommentController::class)->middleware('check.user.login')->group(function () {
    Route::post('/chapter/{chapterId}/comments', 'storeChapterComment')->name('chapter_comments.store');
    Route::delete('/chapter_comments/{commentId}', 'deleteChapterComment')->name('chapter_comments.delete');
    Route::post('/moderator_posts/{postId}/comments', 'storeModeratorPostComment')->name('moderator_post_comments.store');
    Route::delete('/moderator_post_comments/{commentId}', 'deleteModeratorPostComment')->name('moderator_post_comments.delete');
});