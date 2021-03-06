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
    return redirect()->route('events.index');
});

Route::get('/code',function(){
  return view('auth.code');
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
        Route::get('/{id}/join', ['as' => '.join', 'uses' => 'EventController@showJoin']);
        Route::post('/{id}/join', ['as' => '.join', 'uses' => 'EventController@join']);
    });
});

Route::group(['prefix' => 'auth', 'as' => 'auth', 'namespace' => 'Auth'], function(){
    Route::get('login', ['as' => '.login', 'uses' => 'LoginController@showLogin']);
    Route::post('login', ['as' => '.login', 'uses' => 'LoginController@login']);
    Route::get('logout', ['as' => '.logout', 'uses' => 'LoginController@logout']);
    Route::get('register', ['as' => '.register', 'uses' => 'RegisterController@showRegister']);
    Route::post('register', ['as' => '.register', 'uses' => 'RegisterController@register']);
});


Route::post('send', function(){
    $response = exec('curl -X POST  https://api.nexmo.com/verify/json -d api_key=7bbc99d7 -d api_secret=052d83f379272bbb -d number=51' . request('phone') . ' -d brand="TrekkApp"');
    return $response;
});

Route::post('verify', function(){
    $response = exec('curl -X POST  https://api.nexmo.com/verify/check/json -d api_key=7bbc99d7 -d api_secret=052d83f379272bbb -d request_id="' . request('request_id'). '" -d code=' . request('code'));
    return $response;
});