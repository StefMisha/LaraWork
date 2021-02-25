<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;

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
    return view('welcome');
});

Route::group(['prefix' => 'admin', 'as' => 'admin.'], function() {
    Route::get('/' , [IndexController::class, 'index'])
        -> name('admin');
    Route::resource('news', AdminNewsController::class);
    Route::resource('categories', CategoryController::class);
});

Route::group(['prefix' => 'news', 'as' => 'news.'], function() {
    Route::get('/',[NewsController::class,'index'])
        ->name('index');

    Route::get('/{id}', [NewsController::class,'show'])
        ->where('id', '\d+')
        ->name('show');
});

//добавить под элемент для выбора обратной связи /Заказать работу /написать отзыв о работе\/ контакты

Route::get('/contact', function(){
    return view('contact.contact');
});
