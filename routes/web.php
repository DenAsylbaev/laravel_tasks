<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomePageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\HomeController as HomeController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Auth;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])
    ->group(function () {
        Route::get('/', AdminController::class)->name('index');
        Route::get('/news', [AdminNewsController::class, 'index'])
            ->name('news.index');
        Route::get('/news/create', [AdminNewsController::class, 'create'])
            ->name('news.create');
            
        Route::get('/news/edit/{news}', [AdminNewsController::class, 'edit'])
            ->name('news.edit');
        Route::post('/news/edit/{news}', [AdminNewsController::class, 'edit'])
            ->name('news.edit');

        Route::get('/news/update/{news}', [AdminNewsController::class, 'update'])
            ->name('news.update');
        Route::put('/news/update/{news}', [AdminNewsController::class, 'update'])
            ->name('news.update');

        Route::get('/news/destroy/{news}', [AdminNewsController::class, 'destroy'])
            ->name('news.destroy');
        Route::put('/news/destroy/{news}', [AdminNewsController::class, 'destroy'])
            ->name('news.destroy');

        Route::get('/news/store', [AdminNewsController::class, 'store'])
            ->name('news.store');
        Route::post('/news/store', [AdminNewsController::class, 'store'])
            ->name('news.store');

        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('categories.index');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])
            ->name('categories.create');

        Route::get('/categories/edit/{categories}', [AdminCategoryController::class, 'edit'])
            ->name('categories.edit');
        Route::post('/categories/edit/{categories}', [AdminCategoryController::class, 'edit'])
            ->name('categories.edit');

        Route::get('/categories/update/{categories}', [AdminCategoryController::class, 'update'])
            ->name('categories.update');
        Route::put('/categories/update/{categories}', [AdminCategoryController::class, 'update'])
            ->name('categories.update');

        Route::get('/categories/destroy/{categories}', [AdminCategoryController::class, 'destroy'])
            ->name('categories.destroy');
        Route::put('/categories/destroy/{categories}', [AdminCategoryController::class, 'destroy'])
            ->name('categories.destroy');

        Route::get('/categories/store', [AdminCategoryController::class, 'store'])
            ->name('categories.store');
        Route::post('/categories/store', [AdminCategoryController::class, 'store'])
            ->name('categories.store');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');

        Route::get('/users/update/{users}', [AdminUserController::class, 'update'])
            ->name('users.update');
        Route::post('/users/update/{users}', [AdminUserController::class, 'update'])
            ->name('users.update');
    });


Route::group(['prefix' => 'guest'], static function() {
    
    Route::get('/', [WelcomePageController::class, 'show']);
    
    Route::get('/categories', [CategoryController::class, 'index']);
    Route::get('/categories/{categories}', [CategoryController::class, 'show']);

    Route::get('/categories/{categories}/news', [NewsController::class, 'index'])
        ->name('news.index');
        
    Route::get('/categories/news/{news}', [NewsController::class, 'show'])
            ->name('news.show');
});
Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
