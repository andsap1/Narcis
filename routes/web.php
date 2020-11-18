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
Route::get('/atsiliepimai','ShopController@reviews');
Route::get('/login','ShopController@login');
Route::get('/atsiliepimai/naujas', 'ShopController@newReview');
Route::get('/atsiliepimai/redaguoti/{id}', 'ShopController@editReview');
Route::post('/item/insert', 'ShopController@insertPrekeKrepselis')->name('insertItem');
