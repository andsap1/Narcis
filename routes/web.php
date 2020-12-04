<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/shop/{category}', 'ShopController@getCategory');
Route::get('/shops/{color}', 'ShopController@getColor');

Route::get('/cart/{id}', 'CartController@deletePreke')->name('deletePreke');

Route::get('/atsiliepimai','ReviewController@reviews');
Route::get('/atsiliepimai/naujas', 'ReviewController@newReview');
Route::post('atsiliepimai/naujas/','ReviewController@addReview');
Route::get('/atsiliepimai/redaguoti/{id}', 'ReviewController@editReview');
Route::post('/atsiliepimai/redaguotii/{id}', 'ReviewController@editedReview');

Route::post('/item/insert', 'ShopController@insertPrekeKrepselis')->name('insertItem');
Route::get('/cart', 'CartController@index')->name('cart');
Route::get('/order', 'CartController@order');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/signout', 'ShopController@signout');
    });

Route::get('/admin/login', 'Auth\LoginController@showAdminLoginForm');
Route::post('/admin/login', 'Auth\LoginController@adminLogin') ->name('admin.login.submit');

Route::group(['as'=>'adminRoutes.','middleware' => 'auth:admin'], function () {
    Route::get('/admin', 'AdminController@index')->name('admin_app');
    Route::get('/admin/signout', 'AdminController@adminSignout')->name('admin_logout');

    Route::get('/admin/products', 'AdminController@products')->name('products');
    Route::post('/admin/manageProduct', 'AdminController@insertProduct')->name('manageProduct');
    Route::get('/admin/manageProduct', 'AdminController@addProduct')->name('addProduct');
    Route::get('/admin/manageProduct/{id}', 'AdminController@deleteProduct')->name('deleteProduct');
    Route::get('/admin/productedit/{id}','AdminController@editProduct')->name('productedit');
    Route::post('/admin/confirmEditedProduct/{id}', 'AdminController@confirmEditedProduct')->name('confirmEditedProduct');

    Route::get('/admin/categories', 'AdminController@categories')->name('categories');
    Route::get('/admin/manageCategory', 'AdminController@addCategory')->name('addCategory');
    Route::post('/admin/manageCategory', 'AdminController@insertCategory')->name('manageCategory');
    Route::get('/admin/categoryEdit/{id}','AdminController@editCategory')->name('categoryEdit');
    Route::post('/admin/confirmEditedCategory/{id}', 'AdminController@confirmEditedCategory')->name('confirmEditedCategory');

    Route::get('/admin/users', 'AdminController@users')->name('users');

    Route::get('/admin/orders', 'AdminController@orders')->name('orders');
    Route::get('/admin/manageOrder/{id}', 'AdminController@deleteOrders')->name('deleteOrder');
//    Route::post('/admin/manageOrder', 'AdminController@insertOrders')->name('manageOrders');
    Route::get('/admin/orderedit/{id}','AdminController@editOrders')->name('orderedit');
    Route::post('confirmEditedOrder/{id}', 'AdminController@confirmEditedOrders')->name('confirmEditedOrders');

    Route::get('/admin/reviews', 'AdminController@reviews')->name('reviews');
//    Route::post('/admin/manageReview', 'AdminController@insertReview')->name('manageReview');
//    Route::get('/admin/manageReview', 'AdminController@addReview')->name('addReview');
    Route::get('/admin/reviewedit/{id}','AdminController@editReview')->name('reviewedit');
    Route::post('/admin/confirmEditedReview/{id}', 'AdminController@confirmEditedReview')->name('confirmEditedReview');
    Route::get('/admin/reviews/{id}', 'AdminController@deleteReview')->name('deleteReview');
});


//Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

