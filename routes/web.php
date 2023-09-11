<?php

use App\Http\Controllers\NewsCategoriesController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\WelcomePageController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return "Welcome to our newspage";
// });


Route::group(['prefix' => 'guest'], static function() {
    Route::get('/', [WelcomePageController::class, 'show']);
    Route::get('/categories', [NewsCategoriesController::class, 'index']);
    Route::get('/categories/{id}', [NewsCategoriesController::class, 'show'])
        ->where('id', '\d+');

    Route::get('/categories/{id}/news', [NewsController::class, 'index'])
        ->name('news.index');
        
    Route::get('/categories/{id}/news/{id}/show', [NewsController::class, 'show'])
        ->where('id', '\d+')
            ->name('news.show');
});