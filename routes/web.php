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
	return redirect()->to('/dashboard/index');
});

Route::prefix('dashboard')->middleware(['auth'])->namespace('Backend')->group(function () {

    Route::get('/index', 'DashboardController@index')->name('backend.dashboard');
//users
    Route::get('/users','UserController@index')->name('backend.users.index');
    Route::get('/users/create', 'UserController@create')->name('backend.users.create');
 	Route::post('/users/store', 'UserController@store')->name('backend.users.store');
 	Route::get('/users/{user}/edit', 'UserController@edit')->name('backend.users.edit');
    Route::post('/users/{user}/update', 'UserController@update')->name('backend.users.update');
    Route::delete('/users/{user}/destroy', 'UserController@destroy')->name('backend.users.destroy');
//categories
    Route::get('/categories','CategoryController@index')->name('backend.categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('backend.categories.create');
 	Route::post('/categories/store', 'CategoryController@store')->name('backend.categories.store');
 	Route::get('/categories/{category}/edit', 'CategoryController@edit')->name('backend.categories.edit');
    Route::post('/categories/{category}/update', 'CategoryController@update')->name('backend.categories.update');
    Route::delete('/categories/{category}/destroy', 'CategoryController@destroy')->name('backend.categories.destroy');
//products
    Route::get('/products','ProductController@index')->name('backend.products.index');
    Route::get('/products/create', 'ProductController@create')->name('backend.products.create');
 	Route::post('/products/store', 'ProductController@store')->name('backend.products.store');
 	Route::get('/products/{product}/edit', 'ProductController@edit')->name('backend.products.edit');
    Route::post('/products/{product}/update', 'ProductController@update')->name('backend.products.update');
    Route::delete('/products/{product}/destroy', 'ProductController@destroy')->name('backend.products.destroy');
//clients
    Route::get('/clients','ClientController@index')->name('backend.clients.index');
    Route::get('/clients/create', 'ClientController@create')->name('backend.clients.create');
 	Route::post('/clients/store', 'ClientController@store')->name('backend.clients.store');
 	Route::get('/clients/{client}/edit', 'ClientController@edit')->name('backend.clients.edit');
    Route::post('/clients/{client}/update', 'ClientController@update')->name('backend.clients.update');
    Route::delete('/clients/{client}/destroy', 'ClientController@destroy')->name('backend.clients.destroy');
//orders
    //Route::get('/clients/orders','Client\OrderController@index')->name('backend.orders.index');
    Route::get('/clients/{client}/orders/create', 'Client\OrderController@create')->name('backend.orders.create');
 	Route::post('/clients/{client}/orders/store', 'Client\OrderController@store')->name('backend.orders.store');
 	Route::get('/clients/{client}/orders/{order}/edit', 'Client\OrderController@edit')->name('backend.orders.edit');
    Route::post('/clients/{client}/orders/{order}/update', 'Client\OrderController@update')->name('backend.orders.update');
    Route::delete('/clients/{client}/orders/{order}/destroy', 'Client\OrderController@destroy')->name('backend.orders.destroy');


});

Auth::routes(['register' => false ]);

//Route::get('/home', 'HomeController@index')->name('home');
