<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/', [
		'as' => 'index',
		'uses' => 'CategoryController@index',
	]);

Route::resource('categories', 'CategoryController', [
		'only' => ['index', 'show', 'store', 'destroy'],
	]);

Route::delete('subcats/{subcat}', [
	'uses' => 'SubcatController@destroy',
	'as' => 'subcats.destroy'
	]);

Route::resource('categories.subcats', 'SubcatController');

// ITEMS
Route::resource('items', 'ItemController');

// INACTIVE
Route::get('/inactive', ['as' => 'inactive', 'uses' => 'ItemController@showTrashed']);

Route::get('/inactive/{item}', ['as' => 'inactive.item', 'uses' => 'ItemController@restoreTrashed']);

Route::delete('/inactive/{item}', ['as' => 'inactive.delete', 'uses' => 'ItemController@deleteTrashed']);

Route::auth();
