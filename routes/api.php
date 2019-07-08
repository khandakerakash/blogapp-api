<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('v1/categories', 'Api\v1\CategoryController@index')->name('showAllCategory');
Route::get('v1/category/{id}', 'Api\v1\CategoryController@show')->name('showSingleCategory');
Route::post('v1/category', 'Api\v1\CategoryController@store')->name('storeCategory');
Route::put('v1/category/{id}', 'Api\v1\CategoryController@update')->name('updateCategory');
Route::delete('v1/category/{id}', 'Api\v1\CategoryController@destroy')->name('destroyCategory');