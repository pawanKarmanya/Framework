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
Route::group(['middlewareGroups'=>['web']],function(){
    
    Route::post('register',array(
    'as'=>'register',
    'uses'=>'FormController@create'));
    
});


Route::get('validate/{token}',array(
    'as'=>'validate',
    'uses'=>'FormController@validateToken'
));
Route::post('/',array(
    'as'=>'userlogin',
    'before'=>'csrf',
    'uses'=>'FormController@loginUser'
));

Route::get('changepassword',array(
    'as'=>'changepassword',
     'middleware'=>'auth',
    'uses'=> 'FormController@changePassword'));

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
Route::group(['middlewareGroups'=>['web']],function(){
    
Route::post('forgotpassword',array(
     'as'=>'passwordforgot',
    'uses'=> 'FormController@passwordforgot'
));    
   
Route::post('changepassword',array(
     'as'=>'change',
     'uses'=> 'FormController@changeSubmit'
));
});

Route::group(['middleware' => ['web','validateBackHistory']], function () {
    Route::get('/', array(
    'as'=>'/',
    'middleware'=>'auth',
    'uses'=>'FormController@main'
));
});


