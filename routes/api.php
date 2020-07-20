<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('auth')->group(function () {
    Route::post('register', 'AuthController@register');
    Route::post('login', 'AuthController@login');

    Route::group(['middleware' => 'auth.jwt'], function(){
        Route::get('user', 'AuthController@user');
        Route::put('/{user:name}/update', 'UsersController@update');
        Route::post('logout', 'AuthController@logout');
    });
});


Route::post('/register', 'AuthController@register');

Route::get('/regions', 'RegionController@index');
Route::get('/cities/{region_id}', 'CityController@index');

Route::get('/posts', 'PostController@index');
Route::get('/posts/{post}', 'PostController@show');
Route::get('/posts/city/{city_id}', 'PostController@PostsByCity');
Route::get('/{user}/posts', 'PostController@AuthPosts');
Route::post('/posts', 'PostController@store');
