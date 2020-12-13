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


$router->get('/settings', 'SettingsController@edit', 'settings.edit');
$router->post('/settings', 'SettingsController@update', 'settings.update');
