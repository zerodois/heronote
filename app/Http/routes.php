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

Route::get('/', 'RequestController@welcome');

Route::get('/facebook/callback', 'FacebookController@login');

Route::post('/api/save', 'NoteController@save');

Route::get('/{route}', 'NoteController@listen')->where('route', '.*');


