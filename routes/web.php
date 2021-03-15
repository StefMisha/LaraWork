<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Account\IndexController as AccountController;
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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/account', [AccountController::class])->name('account');
    Route::group(['middleware' => 'admin'], function () {

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

    });
});


//test route
Route::get('/example/{category}', fn(\App\Models\Category $category) => $category);


Route::get('/session', function () {
    session(['testsession' => 'value']);
    return redirect('/');
});

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
