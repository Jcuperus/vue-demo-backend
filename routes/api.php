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

Route::post('login', 'AuthController@login');

Route::get('authenticate', function () {
    return response('Authentication successful', 200);
})->middleware('auth:api');

Route::middleware('auth:api')->group(function() {
    Route::prefix('blogs')->group(function() {
        Route::get('/{id}', 'BlogController@show')->where('id', '[0-9]+');
        Route::post('/', 'BlogController@store');
        Route::put('/{id}', 'BlogController@update')->where('id', '[0-9]+');
        Route::delete('/{id}', 'BlogController@destroy')->where('id', '[0-9]+');
    });
});

Route::get('blogs/', 'BlogController@index');
