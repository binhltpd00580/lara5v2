<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {

	Route::get('/', 'FrontendController@index');

});

Route::group(['middleware' => 'web', 'prefix' => 'admin' ], function () {
	
    Route::auth();

    Route::get('/dashboard', 'ArticleController@index');
    Route::get('create', 'ArticleController@create');
	Route::post('create', 'ArticleController@store');
	Route::get('edit/{id}', 'ArticleController@edit');
	Route::put('edit/{id}', 'ArticleController@update');
	Route::delete('delete/{id}', 'ArticleController@destroy');
	Route::get('{slug}', 'ArticleController@show');
	
});
