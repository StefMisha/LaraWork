<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\NewsController as AdminNewsController;
use App\Http\Controllers\ContactController;

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

Route::group(['prefix' => 'contact', 'as' => 'contact.'], function() {
    Route::get('/', [ContactController::class, 'index'])
        ->name('index');

    Route::get('/OrderDownload', [ContactController::class, 'create'])
        ->name('OrderDownload');
});

Route::get('/example/{category}', fn(\App\Models\Category $category) => $category);

/*
Route::get('/collection', function () {
   $array = ['name' => 'Test', 'age' => 26, 'company' => 'Example',
       'work' => 'Programmer', 'country' => 'Russia', 'city' => 'Moscow', 'rules' => [
       'id' => 1, 'title' => 'All previleges'],
       ['id' => 2, 'title' => 'Example data'
   ]];
   $collect = collect($array);
   dd($collect->shuffle());

});*/
