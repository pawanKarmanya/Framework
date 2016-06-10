<?php


Route::get('/', array(
    'as'=>'/',
     
    'uses'=>'FormController@main'
));
Route::get('login',array(
    'as'=>'login',
    'uses'=>'FormController@index'
));
Route::get('registration',array(
    'as'=>'registration',
     
    'uses'=>'FormController@createView'
));
Route::post('registration',array(
    'as'=>'register',
    'uses'=>'FormController@create'
));
Route::get('validate/{token}',array(
    'as'=>'validate',
    'uses'=>'FormController@validateToken'
));
Route::post('/',array(
    'as'=>'userlogin',
    'uses'=>'FormController@loginUser'
));

Route::auth();

Route::get('/home', 'HomeController@index');
