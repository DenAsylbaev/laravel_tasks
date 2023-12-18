<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\NewsController;

use App\Http\Controllers\WelcomePageController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\IndexController as AdminController;
use App\Http\Controllers\Admin\CategoryController as AdminCategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\Admin\ResourceController as AdminResourceController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\SocialProvidersController as SocialProvidersController;
use App\Http\Controllers\Admin\ParserController as ParserController;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'is.admin'])
    ->group(function () {
        Route::get('/', AdminController::class)->name('index');
        Route::get('/news', [AdminNewsController::class, 'index'])
            ->name('news.index');
        Route::get('/news/create', [AdminNewsController::class, 'create'])
            ->name('news.create');
        Route::get('/news/edit/{news}', [AdminNewsController::class, 'edit'])
            ->name('news.edit');
        Route::post('/news/update/{news}', [AdminNewsController::class, 'update'])
            ->name('news.update'); //post
        Route::get('/news/destroy/{news}', [AdminNewsController::class, 'destroy'])
            ->name('news.destroy');
        Route::post('/news/store', [AdminNewsController::class, 'store'])
            ->name('news.store');

        Route::get('/categories', [AdminCategoryController::class, 'index'])
            ->name('categories.index');
        Route::get('/categories/create', [AdminCategoryController::class, 'create'])
            ->name('categories.create');
        Route::get('/categories/edit/{categories}', [AdminCategoryController::class, 'edit'])
            ->name('categories.edit');
        Route::post('/categories/update/{categories}', [AdminCategoryController::class, 'update'])
            ->name('categories.update');
        Route::get('/categories/destroy/{categories}', [AdminCategoryController::class, 'destroy'])
            ->name('categories.destroy');
        Route::post('/categories/store', [AdminCategoryController::class, 'store'])
            ->name('categories.store');

        Route::get('/resources', [AdminResourceController::class, 'index'])
            ->name('resources.index');
        Route::get('/resources/destroy/{resources}', [AdminResourceController::class, 'destroy'])
            ->name('resources.destroy');

        Route::get('/users', [AdminUserController::class, 'index'])
            ->name('users.index');
        Route::post('/users/update/{users}', [AdminUserController::class, 'update'])
            ->name('users.update');

        Route::get('/parser', ParserController::class)
            ->name('parser');
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

Route::group(['middleware' => 'guest'], function () {
    
    // Route::get('/vkontakte/redirect', [SocialProvidersController::class, 'redirect'])
    //     ->name('social-providers.redirect');
    // Route::get('/vkontakte/callback', [SocialProvidersController::class, 'callback'])
    //     ->name('social-providers.callback');

    Route::get('/{driver}/redirect', [SocialProvidersController::class, 'redirect'])
        ->name('social-providers.redirect');
    Route::get('/{driver}/callback', [SocialProvidersController::class, 'callback'])
        ->name('social-providers.callback');
});

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
