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
	return View::make('hello');
});

Route::get('admin/logout', array('as' => 'admin.logout', 'uses' => 'App\Controllers\Admin\AuthController@getLogout'));
Route::get('admin/login', array('as' => 'admin.login', 'uses' => 'App\Controllers\Admin\AuthController@getLogin'));
Route::get('password/remind', array('as' => 'reminder.remind.get', 'uses' => '\RemindersController@getRemind'));
Route::get('password/reset/{token}', array('as' => 'reminder.reset.get', 'uses' => '\RemindersController@getReset'));

Route::post('admin/login', array('as' => 'admin.login.post', 'uses' => 'App\Controllers\Admin\AuthController@postLogin'));
Route::post('reminder/reset', array('as' => 'reminder.reset.post', 'uses' => '\RemindersController@postReset'));
Route::post('reminder/remind', array('as' => 'reminder.remind.post', 'uses' => '\RemindersController@postRemind'));

Route::group(array('prefix' => 'admin', 'before' => 'auth.admin'), function()
{
    Route::any('/', 'App\Controllers\Admin\PagesController@index');
    Route::resource('articles', 'App\Controllers\Admin\ArticlesController');
    Route::resource('pages', 'App\Controllers\Admin\PagesController');
});

