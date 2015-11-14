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
Route::get('author/edit/{id}', 'AuthorController@edit');
Route::post('author/update', 'AuthorController@update');
//栏目
Route::get('topic', 'TopicController@index');
Route::get('topic/create', 'TopicController@show');
Route::post('topic/create', 'TopicController@create');
Route::get('topic/edit/{id}', 'TopicController@edit');
Route::post('topic/update', 'TopicController@update');
Route::get('topic/delete/{id}', 'TopicController@delete');
Route::post('topic/restore/{id}', 'TopicController@restore');
//文章
Route::get('article', 'ArticleController@index');
Route::get('article/create', 'ArticleController@show');
Route::post('article/create', 'ArticleController@create');
Route::post('article/update', 'ArticleController@update');
Route::get('article/edit/main/{id}', 'ArticleController@edit_main');
Route::get('article/edit/content/{id}', 'ArticleController@edit_content');
Route::get('article/delete/{id}', 'ArticleController@destroy');
Route::get('article/add/homepage/{id}', 'ArticleController@add_homepage');
Route::get('article/remove/homepage/{id}', 'ArticleController@remove_homepage');
Route::get('article/add/headlines/{id}', 'ArticleController@add_headlines');
Route::get('article/remove/headlines/{id}', 'ArticleController@remove_headlines');
Route::post('article/content/delete/{id}', 'ArticleController@delete');
Route::post('article/content/add/big', 'ArticleController@content_add_big');
Route::post('article/content/add/small', 'ArticleController@content_add_small');
Route::post('article/content/add/text', 'ArticleController@content_add_text');
Route::post('article/content/add/pic', 'ArticleController@content_add_pic');
Route::post('article/content/add/link', 'ArticleController@content_add_link');
Route::post('article/accept', 'ArticleController@accept');
Route::post('article/cancel_accept', 'ArticleController@cancel_accept');
//推送
Route::get('notification', 'NotificationController@index');
//文件
Route::post('/file', 'StorageController@postFile');
Route::get('/file', 'StorageController@getFile');
Route::post('/file/delete', 'StorageController@deleteFile');