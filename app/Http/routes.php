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

Route::get('/', ['as' => 'index', 'uses' => 'MainController@index']);

Route::get('/hw1', ['as' => 'hw1', 'uses' => 'MainController@hw1']);

Route::get('/login', ['as' => 'login', 'uses' => 'MainController@login']);

Route::post('/login/check', ['as' => 'login.check', 'uses' => 'MainController@logincheck']);

Route::get('/logout', ['as' => 'logout', 'uses' => 'MainController@logout']);

Route::get('/signup', ['as' => 'signup', 'uses' => 'MainController@signup']);

Route::post('/signup/todb', ['as' => 'signup.todb', 'uses' => 'MainController@signuptoDB']);

//-----------------------------message--------------------------------------

Route::resource('message', 'MessageController', ['names' => ['store' => 'message.post']]);

//----------------------------portal----------------------------------------

Route::get('/login/portal', ['as' => 'login.portal', 'uses' => 'PortalController@loginportal']);

Route::get('/loging/portal/back', ['as' => 'loging.portal.back', 'uses' => 'PortalController@portalback']);

Route::get('/logout/portal', ['as' => 'logout.portal', 'uses' => 'PortalController@logoutportal']);

Route::get('/portallogout', ['as' => 'portallogout', 'uses' => 'PortalController@portallogout']);

//-----------------------------HW1-----------------------------------------

Route::post('/mul', ['as' => 'mul', 'uses' => 'MainController@mul']);
