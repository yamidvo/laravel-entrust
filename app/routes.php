<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('login.login');
});

Route::post('login', 'AuthController@login');
Route::get('logout', 'AuthController@logout');

Route::resource('/home','HomeController');

Route::resource('/users','UserController');

Route::resource('/roles','RolesController');

Route::get('/permisos','PermisosController@index');
Route::get('/permisos/asignar','PermisosController@asignar');
Route::get('/permisos/desasignar','PermisosController@desasignar');
