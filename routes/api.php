<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::group(['prefix' => '/'], function ($router) {
    Route::post('auth/login', 'HomeController@login');
    Route::post('auth/logout', 'HomeController@logout');
    Route::post('/post/create', 'HomeController@store');
    Route::get('/post/detail/{id}', 'HomeController@detail');
    Route::get('/home', 'HomeController@index');
    Route::post('/post/upload', 'HomeController@upload');
    Route::delete('/post/delete/{id}', 'HomeController@delete');
    Route::get('/chartline', 'HomeController@ChartLine');
    Route::get('/chartbar', 'HomeController@ChartBar');

    
});


