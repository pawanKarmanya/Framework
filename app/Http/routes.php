<?php


Route::get('login',array(
    'as'=>'login',
    'middleware'=>'valid',
    'uses'=>'FormController@index'
));
Route::get('registration',array(
    'as'=>'registration',
    'middleware'=>'valid',
    'uses'=>'FormController@createView'
));
Route::post('register',array(
    'as'=>'register',
    'middlewareGroups'=>'web',
    'uses'=>'FormController@create'));

Route::get('validate/{token}',array(
    'as'=>'validate',
    'uses'=>'FormController@validateToken'
));
Route::post('/',array(
    'as'=>'userlogin',
    'middlewareGroups'=>'web',
    'uses'=>'FormController@loginUser'
));

Route::get('changepassword',array(
    'as'=>'changepassword',
     'middleware'=>'auth',
    'uses'=> 'FormController@changePassword'));
Route::post('changepassword',array(
     'as'=>'change',
    'middlewareGroups'=>'web',
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
    'middleware'=>'valid',
    'uses'=>'FormController@forgotpassword'
));
Route::post('forgotpassword',array(
     'as'=>'passwordforgot',
    'middlewareGroups'=>'web',
     'uses'=> 'FormController@passwordforgot'
));
Route::group(['middleware' => ['web','auth','validateBackHistory']], function () {
    Route::get('/', array(
    'as'=>'/',
    'middleware'=>'auth',
    'uses'=>'FormController@main'
));
});

