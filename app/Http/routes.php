<?php


Route::get('/', array(
    'as'=>'/',
    'middleware'=>'auth',
    'uses'=>'FormController@main'
));
Route::get('login',array(
    'as'=>'login',
    'uses'=>'FormController@index'
));
Route::get('register',array(
    'as'=>'registration',
    'uses'=>'FormController@createView'
));
Route::post('register',array(
    'as'=>'register',
    'uses'=>'FormController@create'));

Route::get('validate/{token}',array(
    'as'=>'validate',
    'uses'=>'FormController@validateToken'
));
Route::post('/',array(
    'as'=>'userlogin',
    'uses'=>'FormController@loginUser'
));
Route::get('changepassword',array(
    'as'=>'changepassword',
     'middleware'=>'auth',
    'uses'=> 'FormController@changePassword'));
Route::post('changepassword',array(
     'as'=>'change',
     'uses'=> 'FormController@changeSubmit'
));
Route::get('logout',array(
    'as'=>'logout',
    'uses'=>'FormController@logout'
));
Route::get('user',array(
    'as'=>'user',
    'uses'=>'FormController@user'
));
Route::get('forgotpassword',array(
    'as'=>'forgotpassword',
    'uses'=>'FormController@forgotpassword'
));
Route::post('forgotpassword',array(
     'as'=>'passwordforgot',
     'uses'=> 'FormController@passwordforgot'
));
