<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomePageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', AdminController::class)->name('index');
    Route::get('/news', [AdminNewsController::class, 'index'])
        ->name('news.index');
    Route::get('/news/create', [AdminNewsController::class, 'create'])
        ->name('news.create');
    Route::get('/news/store', [AdminNewsController::class, 'store'])
        ->name('news.store');
    Route::post('/news/store', [AdminNewsController::class, 'store'])
        ->name('news.store');

    Route::get('/categories', [AdminCategoryController::class, 'index'])
        ->name('categories.index');
    Route::get('/categories/create', [AdminCategoryController::class, 'create'])
        ->name('categories.create');

    Route::get('/categories/store', [AdminCategoryController::class, 'store'])
        ->name('categories.store');
    Route::post('/categories/store', [AdminCategoryController::class, 'store'])
        ->name('categories.store');

});


Route::group(['prefix' => 'guest'], static function() {
    
    Route::get('/', [WelcomePageController::class, 'show']);
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{id}', [CategoryController::class, 'show'])
        ->where('id', '\d+');

    Route::get('/categories/{id}/news', [NewsController::class, 'index'])
        ->name('news.index');
        
    Route::get('/categories/{id}/news/{news_id}/show', [NewsController::class, 'show'])
        ->where('news_id', '\d+')
            ->name('news.show');
});