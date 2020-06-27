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
    Route::delete('/users/destroy/{user}', 'UserController@destroy')->name('backend.users.destroy');
//categories
    Route::get('/categories','CategoryController@index')->name('backend.categories.index');
    Route::get('/categories/create', 'CategoryController@create')->name('backend.categories.create');
 	Route::post('/categories/store', 'CategoryController@store')->name('backend.categories.store');
 	Route::get('/categories/{user}/edit', 'CategoryController@edit')->name('backend.categories.edit');
    Route::post('/categories/{user}/update', 'CategoryController@update')->name('backend.categories.update');
    Route::delete('/categories/destroy/{user}', 'CategoryController@destroy')->name('backend.categories.destroy');


});

Auth::routes(['register' => false ]);

//Route::get('/home', 'HomeController@index')->name('home');
