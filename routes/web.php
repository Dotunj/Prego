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
Route::get('projects/{projects}/tasks/{tasks}/edit', [
      'uses'=> 'ProjectTasksController@getoneProjectTask',
       'as'=> 'projects.tasks'
]);
Route::put('projects/{projects}/tasks/{tasks}', [
      'uses'=>'ProjectTasksController@updateOneProjectTask',
       ]);
Route::delete('projects/{projects}/tasks/{tasks}', [
       'uses'=> 'ProjectTasksController@deleteOneProjectTask',
      ]);
Route::post('projects/{projects}/files', [
     'uses'=>'FilesController@uploadAttachments',
      'as'=> 'projects.files',
      'middleware'=> ['auth']
	]);
Route::post('projects/{projects}/comments', [
     'uses'=> 'ProjectCommentController@postNewComment',
      'as'=>'projects.comments.create',
      'middleware'=>['auth']
]);
Route::get('projects/{projects}/comments/{comments}/edit', [
       'uses'=>'ProjectCommentController@getOneProjectComment',
        'as'=> 'projects.comments'
   ]);
Route::put('projects/{projects}/comments/{comments}', [
     'uses'=> 'ProjectCommentController@updateOneProjectComment',
  ]);
Route::delete('projects/{projects}/comments/{comments}', [
  'uses'=>'ProjectCommentController@deleteOneProjectComment',
]);
//Collaborator routes
Route::post('projects/{projects}/collaborators', [
     'uses'=>'ProjectCollaboratorsController@addCollaborator',
      'as'=> 'projects.collaborators.create',
      'middleware'=>['auth']
 ]);