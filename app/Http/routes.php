<?php

//首页
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index');

//登录注册等账号功能
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');
//作者
Route::get('author', 'AuthorController@index');
Route::get('author/create', 'AuthorController@show');
Route::post('author/create', 'AuthorController@create');
Route::delete('author/delete','AuthorController@destroy');
Route::get('author/edit/{id}', 'AuthorController@edit');
Route::post('author/update', 'AuthorController@update');
//文章
Route::get('article', 'ArticleController@index');
Route::get('article/create', 'ArticleController@show');
//文件
Route::post('/file', 'StorageController@postFile');
Route::get('/file', 'StorageController@getFile');
Route::post('/file/delete', 'StorageController@deleteFile');