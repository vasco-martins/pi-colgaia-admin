<?php

/**
 * Application Routes
 */

$router->get('/', 'HomeController@index', 'home.index');

$router->get('/login', 'AuthController@show', 'auth.login');
$router->post('/login', 'AuthController@login', 'auth.login');
$router->get('/logout', 'AuthController@logout', 'auth.logout');


$router->get('/pages', 'PageController@index', 'pages.index');
$router->get('/pages/create', 'PageController@create', 'pages.create');
$router->post('/pages/create', 'PageController@store', 'pages.store');
$router->get('/pages/:id/edit', 'PageController@edit', 'pages.edit');
$router->post('/pages/:id/edit', 'PageController@update', 'pages.update');
$router->get('/pages/:id/destroy', 'PageController@destroy', 'pages.destroy');

$router->get('/news', 'NewsController@index', 'news.index');
$router->get('/news/create', 'NewsController@create', 'news.create');
$router->post('/news/create', 'NewsController@store', 'news.store');
$router->get('/news/:id/edit', 'NewsController@edit', 'news.edit');
$router->post('/news/:id/edit', 'NewsController@update', 'news.update');
$router->get('/news/:id/destroy', 'NewsController@destroy', 'news.destroy');

$router->get('/users', 'UserController@index', 'users.index');
$router->get('/users/create', 'UserController@create', 'users.create');
$router->post('/users/create', 'UserController@store', 'users.store');
$router->get('/users/:id/edit', 'UserController@edit', 'users.edit');
$router->post('/users/:id/edit', 'UserController@update', 'users.update');
$router->get('/users/:id/destroy', 'UserController@destroy', 'users.destroy');


$router->get('/settings', 'SettingsController@edit', 'settings.edit');
$router->post('/settings', 'SettingsController@update', 'settings.update');


$router->get('/messages', 'MessageController@index', 'messages.index');
$router->get('/messages/:id', 'MessageController@show', 'messages.show');


$router->post('/ajax/images', 'ImageController@store', 'images.stre');
