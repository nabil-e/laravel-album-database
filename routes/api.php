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
Route::get('album', 'AlbumController@show');
// Route::middleware('auth:api')->group(function () {
    // Route::post('logout', 'ApiAuthController@logout');
    // Route::post('refresh', 'ApiAuthController@refresh');
    // Route::get('user', 'ApiAuthController@user');
    Route::post('/register', 'AuthController@register');
    Route::post('/login', 'AuthController@login');
    Route::post('/logout', 'AuthController@logout');    

    // Route::get('/lad-api','HomeController@lad_api');
    Route::post('album', 'AlbumController@store');
    // Route::get('album', 'AlbumController@show');
    Route::put('album', 'AlbumController@update');
    Route::delete('album','AlbumController@destroy');
// });

Route::post('login', 'ApiAuthController@login');