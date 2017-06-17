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

Route::get('/index', 'HomeController@index');
Route::get('/auth/register', [
	'uses'=>'AuthController@getRegister',
	 'as'=> 'auth.register',
	 'middleware'=>['guest']
]);
Route::post('/auth/register', [
	'uses'=>'AuthController@postRegister',
	 'middleware'=>['guest']
]);
Route::get('/auth/signin', [
	'uses'=>'AuthController@getLogin',
	 'as'=> 'auth.login',
	'middleware'=>['guest']
]);
Route::post('/auth/signin', [
	'uses'=>'AuthController@postLogin',
	 'middleware'=>['guest']
]);
Route::get('/logout', [
     'uses'=>'AuthController@logout',
       'as'=>'auth.logout'
]);
Route::resource('projects', 'ProjectController');

//Task routes
Route::post('projects/{projects}/tasks', [
     'uses'=> 'ProjectTasksController@postNewTask',
      'as'=> 'projects.tasks.create'
]);
