<?php

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

use Illuminate\Support\Facades\Route;

Route::get('/', 'ShopController@index')->name('index')->middleware('checkLogin');
Route::get('/products/{id}/add-cart', 'ShopController@addToCart')->name('addToCart');
Route::get('/products/{id}/delete-cart', 'ShopController@removeItemCart')->name('removeItemCart');
Route::get('cart', 'ShopController@showCart')->name('showCart');
Route::get('/cart/{id_product}/update-cart/', 'ShopController@updateCart')->name('ChangeQuantityProduct');

Route::get('register', 'UserController@formRegister')->name('formRegister');
Route::post('register', 'UserController@register')->name('register');
Route::get('login', 'UserController@formLogin')->name('formLogin');
Route::post('login', 'UserController@login')->name('login');
Route::get('logout', 'UserController@logout')->name('logout')->middleware('checkLogin');

Route::prefix('users')->middleware('checkLogin')->group(function () {
    Route::get('/', 'UserController@index')->name('users.index');
    Route::get('{id}/edit', 'UserController@formEdit')->name('formEdit');
    Route::post('{id}/edit', 'UserController@update')->name('update');
    Route::get('{id}/delete', 'UserController@destroy')->name('destroyUser');
});

Route::prefix('category')->middleware('checkLogin')->group(function () {
    Route::get('/', 'CategoryController@index')->name('categoryList');
    Route::get('create', 'CategoryController@formCreate')->name('formCreateCategory');
    Route::post('create', 'CategoryController@create')->name('createCategory');
    Route::get('{id}/edit', 'CategoryController@formEdit')->name('formEditCategory');
    Route::post('{id}/edit', 'CategoryController@update')->name('updateCategory');
    Route::get('{id}/delete', 'CategoryController@destroy')->name('destroyCategory');
});

Route::prefix('product')->middleware('checkLogin')->group(function () {
    Route::get('/', 'ProductController@index')->name('productList');
    Route::get('create', 'ProductController@formCreate')->name('formCreateProduct');
    Route::post('create', 'ProductController@create')->name('createProduct');
    Route::get('{id}/edit', 'ProductController@formEdit')->name('formEditProduct');
    Route::post('{id}/edit', 'ProductController@update')->name('updateProduct');
    Route::get('{id}/delete', 'ProductController@destroy')->name('destroyProduct');
    Route::get('/search', 'ProductController@search')->name('search');
});
