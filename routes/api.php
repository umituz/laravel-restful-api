<?php

use Illuminate\Http\Request;

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

//Route::get('/merhaba',function(){
//    return "hello";
//});

Route::apiResource('/users','Api\UserController');
Route::apiResource('/products','Api\ProductController');
Route::apiResource('/categories','Api\CategoryController');

//Route::apiResources([
//    'products' => 'Api\ProductController',
//    'users' => 'Api\UserController'
//]);
