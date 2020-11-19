<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShopController;
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

Route::get('/', 'ShopController@index');
Route::get('/item/{id}', 'ShopController@openItem');

Route::get('/atsiliepimai','ReviewController@reviews');
Route::get('/atsiliepimai/naujas', 'ReviewController@newReview');
Route::post('atsiliepimai/naujas/','ReviewController@addReview');
Route::get('/atsiliepimai/redaguoti/{id}', 'ReviewController@editReview');
Route::post('/atsiliepimai/redaguotii/{id}', 'ReviewController@editedReview');

Route::post('/item/insert', 'ShopController@insertPrekeKrepselis')->name('insertItem');
Route::get('/cart', 'CartController@index')->name('cart');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/signout', 'ShopController@signout');
    });

//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

