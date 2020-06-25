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
    return view('welcome');
});

Route::prefix('dashboard')->middleware(['auth'])->namespace('Backend')->group(function () {

    Route::get('/check', 'DashboardController@index')->name('backend.dashboard');

    //Route::resource('users','UserController')->except(['show']);
    Route::get('/users','UserController@index')->name('backend.users.index');
	Route::get('/users/create', 'UserController@create')->name('backend.users.create');
 	Route::post('/users/store', 'UserController@store')->name('backend.users.store');
 	Route::get('/users/{user}/edit', 'UserController@edit')->name('backend.users.edit');
    Route::post('/users/{user}/update', 'UserController@update')->name('backend.users.update');
// 

        Route::get('/users/destroy/{id}', 'UserController@destroy')->name('backend.users.destroy');




});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
