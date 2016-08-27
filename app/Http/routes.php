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
Route::get('add-to-cart/{item}', [
		'as' => 'item.addToCart',
		'uses' => 'ItemController@addToCart'
	]);
Route::get('shopping-cart/', [
	'as' => 'item.showCart',
	'uses' => 'ItemController@showCart'
	]);

Route::get('/', [
		'as' => 'index',
		'uses' => 'CategoryController@index',
	]);
// KATEGORIJE
Route::resource('categories', 'CategoryController', [
		'only' => ['index', 'show', 'store', 'destroy'],
	]);

// POTKATEGORIJE
Route::delete('subcats/{subcat}', [
	'uses' => 'SubcatController@destroy',
	'as' => 'subcats.destroy'
	]);

Route::resource('categories.subcats', 'SubcatController');

// ITEMS
Route::resource('items', 'ItemController');

// ITEMS - PONUDE

Route::group(['prefix' => 'ponude'], function(){
	Route::get('novo', 'ItemController@novo');
	Route::get('popular', 'ItemController@popular');
	Route::get('akcija', 'ItemController@akcija');
});

// ITEMS - INACTIVE
Route::get('/inactive', ['as' => 'inactive', 'uses' => 'ItemController@showTrashed']);

Route::get('/inactive/{item}', ['as' => 'inactive.item', 'uses' => 'ItemController@restoreTrashed']);

Route::delete('/inactive/{item}', ['as' => 'inactive.delete', 'uses' => 'ItemController@deleteTrashed']);

Route::auth();
