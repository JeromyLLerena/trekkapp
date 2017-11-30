<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function(){
    return view('welcome');
});

Route::get('/crearevento',function(){
  return view('events.create');
});

Route::get('/code',function(){
  return view('auth.code');
});

Route::get('/index',function(){
  return view('events.index');
});

Route::get('/pasarela',function(){
  return view('payment.pasarela');
});

Route::group(['middleware' => 'auth'], function(){
    Route::group(['prefix' => 'home', 'as' => 'home', 'namespace' => 'Home'], function(){
        Route::get('/', ['as' => '.dashboard', 'uses' => 'HomeController@dashboard']);
    });

    Route::group(['prefix' => 'events', 'as' => 'events', 'namespace' => 'Events'], function(){
        Route::get('/', ['as' => '.index', 'uses' => 'EventController@index']);
        Route::get('create', ['as' => '.create', 'uses' => 'EventController@showCreate']);
        Route::post('create', ['as' => '.create', 'uses' => 'EventController@create']);
        Route::get('/{id}/edit', ['as' => '.edit', 'uses' => 'EventController@showEdit']);
        Route::post('/{id}/edit', ['as' => '.edit', 'uses' => 'EventController@edit']);
        Route::get('/{id}/delete', ['as' => '.delete', 'uses' => 'EventController@delete']);
    });
});

Route::group(['prefix' => 'auth', 'as' => 'auth', 'namespace' => 'Auth'], function(){
    Route::get('login', ['as' => '.login', 'uses' => 'LoginController@showLogin']);
    Route::post('login', ['as' => '.login', 'uses' => 'LoginController@login']);
    Route::get('logout', ['as' => '.logout', 'uses' => 'LoginController@logout']);
    Route::get('register', ['as' => '.register', 'uses' => 'RegisterController@showRegister']);
    Route::post('register', ['as' => '.register', 'uses' => 'RegisterController@register']);
});
