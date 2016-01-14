<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/',[
    'as'=>'master',
    'uses'=>'LinkController@getIndex'
]);

Route::get('/project',[
    'as'=>'projects',
    'uses'=>'ProjectsController@index'
]);







// Utilise les methode des controleur a la place d'ID
Route::model('tasks', 'Task');
Route::model('projects', 'Project');

// Change l'url pour afficher le slug qu'une ID dégeulasse
Route::bind('tasks', function($value, $route) {
    return App\Task::whereSlug($value)->first();
});
Route::bind('projects', function($value, $route) {
    return App\Project::whereSlug($value)->first();
});


// on rajoute les controlleurs a la liste des routes , afin d'apeller les fonctions dans les controlleur sans avoir
// a faire autant de route qu'il ,n'y a de fonction dans le controlleur ( i guess )
Route::resource('projects', 'ProjectsController');
Route::resource('projects.tasks', 'TasksController');

































































Route::get('/infos',[
    'as'=>'infos',
    'uses'=>'NonAuthController@infos',
]);

Route::get('/login',[
    'as'=>'login',
    'uses'=>'LinkController@login',
]);

Route::get('/register',[
    'as'=>'register',
    'uses'=>'LinkController@register',
]);


Route::get('/logout',[
    'as' =>'logout',
    'uses' =>'Auth\AuthController@getLogout'
]);

Route::get('/register',[
    'as' =>'register',
    'uses' =>'Auth\AuthController@getRegister'
]);

// Cette route sert a rediriger si tu n'es pas connecté

Route::get('home',function() {
    if(Auth::guest()){
        return Redirect::to('auth/login');
    }else{
      return Redirect::to('/');
    }
});











// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
