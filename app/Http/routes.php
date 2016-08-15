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

Route::post('/category', 'CategoryController@post');

Route::delete('/category/{category}', 'CategoryController@destroy');

Route::get('/categories', [
		'as' => 'categories.index',
		'uses' => 'ItemController@index',
	]);

Route::get('/categories/{categories}', 'ItemController@show');


// Route::get('/categories', 'SubcatController@index');

Route::get('categories/{categories}/subcats/{subcats}', 'SubcatController@show');

Route::post('/subcat/{subcat}', 'SubcatController@post');

Route::delete('/subcat/{subcat}', 'SubcatController@destroy');

// ITEMS
Route::post('/item', 'ItemController@store');

Route::get('item/{item}/edit', 'ItemController@edit');

Route::patch('item/{item}', ['as' => 'item.update', 'uses' => 'ItemController@update']);

Route::delete('/item/{item}', 'ItemController@destroy');

// INACTIVE
Route::get('/inactive', ['as' => 'inactive', 'uses' => 'ItemController@showTrashed']);

Route::get('/inactive/{item}', ['as' => 'inactive.item', 'uses' => 'ItemController@restoreTrashed']);

Route::delete('/inactive/{item}', ['as' => 'inactive.delete', 'uses' => 'ItemController@deleteTrashed']);

Route::post('upload', 'UploadController@postFile');

Route::get('/formz', function () {
	return view('formz');
});

Route::get('api/v1/get-items', 'ItemController@showAll');

Route::get('categories/api/v1/get-items', 'ItemController@showAll');

Route::get('categories/{categories}/subcats/api/v1/get-items', 'ItemController@showAll');

Route::post('api/v1/solditem', 'SoldItemController@store');

Route::auth();
