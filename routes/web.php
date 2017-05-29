<?php
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
//*********************Rutas para administrador*********************************
Route::group(['middleware' => ['Outside','HistoryBack']], function () {
    //Rutas externas módulo de usuarios
	Route::get('/user', function () {return view('user.loginUser');});
	Route::post('/login','userController@login');
});

Route::group(['middleware' => ['inside','HistoryBack']], function () {
    //Rutas internas Módulo de usuarios
   	Route::get('/', function () {return view('user.panelAdmin');});
	Route::get('/user/panelAdmin', function () {return view('user.panelAdmin');});
	Route::get('/logout','userController@logout');
	Route::get('/user/create','userController@create');
	Route::post('/user/store','userController@store');
	Route::get('/user/listUser','userController@index');
	Route::get('/user/edit/{id}','userController@edit');
	Route::get('/user/update/{id}','userController@update');
	Route::get('/user/destroy/{id}','userController@destroy');
});


