<?php

use App\Controllers;
use App\Routes\Route;

Route::get('/', 'HomeController@index');

Route::get('/home', 'HomeController@home');



Route::get('/user/index', 'UserController@index');
Route::get('/user/create', 'UserController@create');
Route::post('/user/create', 'UserController@store');


Route::get('/timbre/index', 'TimbreController@index');
Route::get('/timbre/create', 'TimbreController@create');
Route::post('/timbre/create', 'TimbreController@store');

Route::get('/timbre/edit', 'TimbreController@edit');
Route::post('/timbre/edit', 'TimbreController@update');

Route::get('/timbre/show', 'TimbreController@show');
Route::get('/timbre/delete', 'TimbreController@delete');

Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@store');
Route::get('/logout', 'AuthController@delete');

Route::dispatch();