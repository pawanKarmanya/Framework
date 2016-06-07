<?php


Route::get('/', function () {
    return view('index');
});
Route::get('login',array(
    'as'=>'login',
    'uses'=>'FormController@index'
));
Route::get('registration',array(
    'as'=>'registration',
    'uses'=>'FormController@createView'
));
Route::post('register',array(
    'as'=>'register',
    'uses'=>'FormController@create'
));