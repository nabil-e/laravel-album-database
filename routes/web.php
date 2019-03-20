<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", "DescController@index");

Route::get("/{name}-{id}", function($name,$id){
    return "<h1>Salut $name ton id = $id</h1>";
})->where("name",'[A-Za-z0-9/_-]+')->where("id",'[0-9]+');



Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
