<?php

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

Route::get('/', function () {
    return "Welcome to our newspage";
});

Route::get('/about', static function () {
    return 'Information about our project:....';
});

Route::get('/news/{index}', static function (int $index) {
    return "news number {$index}:....";
});