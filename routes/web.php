<?php
/*
Route::get('products/', 'ProductsController@index');
Route::get('products/{product}', 'ProductsController@show');
*/

// SellersController
Route::get('/sellers', 'SellersController@index');
Route::get('/sellers/{seller}', 'SellersController@show');
Route::post('/sellers', 'SellersController@store');
Route::put('/sellers/{seller}', 'SellersController@update');
Route::patch('/sellers/{seller}', 'SellersController@update');
Route::delete('/sellers/{seller}', 'SellersController@destroy');

// AddressesController
Route::post('/sellers/{seller}/address', 'AddressesController@store');
Route::put('/sellers/{seller}/address', 'AddressesController@update');

// ProductsController
Route::get('/products', 'ProductsController@index');
Route::get('/products/{product}', 'ProductsController@show');
Route::post('/products', 'ProductsController@store');
Route::put('/products/{product}', 'ProductsController@update');
Route::patch('/products/{product}', 'ProductsController@update');
Route::delete('/products/{product}', 'ProductsController@destroy');

// ReviewsController
Route::post('/products/{product}/reviews', 'ReviewsController@store');
Route::get('/products/{product}/reviews', 'ReviewsController@index');
Route::delete('/products/{product}/reviews/{review}', 'ReviewsController@destroy');