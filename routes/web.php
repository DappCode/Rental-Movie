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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', ['uses' => 'AuthController@login', 'as' => 'auth.login']);
Route::post('/login', ['uses' => 'AuthController@authenticate', 'as' => 'auth.auth']);
Route::get('/logout', ['uses' => 'AuthController@destroy', 'as' => 'auth.destroy']);

Route::group(['middleware' => 'verify.auth'], function(){

    Route::get('/movie', 'MoviesController@index');
    Route::get('/admin', 'MoviesController@admin');

    Route::get('/admin/create', ['uses' => 'MoviesController@create', 'as' => 'movie.create']);
    Route::post('/admin/create', ['uses' => 'MoviesController@store', 'as' => 'movie.store' ]);

    Route::get('/movie/search', ['as' => 'movie.search', 'uses' => 'MoviesController@search']);
    Route::get('/movie/detail{id}', ['uses' => 'MoviesController@detail', 'as' => 'movie.detail']);
    Route::delete('/admin/destroy/{id}', ['uses' => 'MoviesController@destroy', 'as' => 'movie.destroy' ]);

    Route::get('/admin/edit/{id}', ['uses' => 'MoviesController@edit', 'as' => 'movies.edit']);
    Route::put('/admin/update/{id}', ['uses' => 'MoviesController@update', 'as' => 'movies.bla']);

});


