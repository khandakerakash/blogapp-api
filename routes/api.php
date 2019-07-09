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

Route::group(['prefix'=>'v1'],function (){

    // Category URLS
    Route::get('categories', 'Api\v1\CategoryController@index')->name('showAllCategory');
    Route::get('category/{id}', 'Api\v1\CategoryController@show')->name('showSingleCategory');
    Route::post('category', 'Api\v1\CategoryController@store')->name('createCategory');
    Route::put('category/{id}', 'Api\v1\CategoryController@update')->name('updateCategory');
    Route::delete('category/{id}', 'Api\v1\CategoryController@destroy')->name('destroyCategory');

    // Person URLS
    Route::get('people', 'Api\v1\CategoryController@index')->name('showAllPerson');
    Route::get('person/{id}', 'Api\v1\CategoryController@show')->name('showSinglePerson');
    Route::post('person', 'Api\v1\CategoryController@store')->name('createPerson');
    Route::put('person/{id}', 'Api\v1\CategoryController@update')->name('updatePerson');
    Route::delete('person/{id}', 'Api\v1\CategoryController@destroy')->name('destroyPerson');
});

