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

Route::get('/', 'AskController@index');

Route::post('/', 'AskController@create');

Route::get('/test', function(){
    Sms::send(array('to'=>'+15083142814', 'text'=>'hello world'));
    return 'sms sent';
});