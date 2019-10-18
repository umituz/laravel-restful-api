<?php

use Illuminate\Http\Request;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/merhaba',function(){
//    return "hello";
//});

Route::get('/categories/custom1','Api\CategoryController@custom1')->name('categories.custom1');
Route::get('/categories/custom2','Api\CategoryController@custom2')->name('categories.custom2');
Route::get('/products/custom1','Api\ProductController@custom1')->name('products.custom1');
Route::get('/products/custom2','Api\ProductController@custom2')->name('products.custom2');

Route::apiResource('/users','Api\UserController');
Route::apiResource('/products','Api\ProductController');
Route::apiResource('/categories','Api\CategoryController');


//Route::apiResources([
//    'products' => 'Api\ProductController',
//    'users' => 'Api\UserController'
//]);
