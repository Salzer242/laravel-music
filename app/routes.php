<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/
//
Route::get('{id}/room/off', 'RoomController@doOff');


Route::get('about', function(){
	return View::make('about');
});


//
Route::get('{id}/room/currentsong', 'RoomController@getCurrentSong');



//
Route::get('{id}/room/addsong', 'RoomController@addSong');
//
Route::get('{id}/room/votesong', 'RoomController@voteSong');

//
Route::get('{id}/room/start', 'RoomController@showStart');
//
Route::post('{id}/room/start', 'RoomController@doStart');

//
Route::get('{id}/room/setting', 'RoomController@showUpdate');
//
Route::post('{id}/room/setting', 'RoomController@doUpdate');

//binh
Route::get('search', 'SongController@search');


// route to show the login form
Route::get('logout','UserController@doLogout');

Route::get('/','HomeController@show');

// route to show the login form
Route::get('login','UserController@showLogin');

// route to process the form
Route::post('login', 'UserController@doLogin');

// 
Route::get('register', 'UserController@showRegister');

//
Route::post('register', 'UserController@doRegister');



//
//Route::group(array('prefix' => 'u'), function()
//{	
//xem danh sach user
Route::get('users', 'UserController@index');
// show profile
Route::get('{id}','UserController@show')->where('id', '[0-9]+');  
//});

//
//Route::group(array('prefix' => 'r'), function()
//{	
//
Route::get('rooms', 'RoomController@index');
//
Route::get('{id}/room','RoomController@show')->where('id', '[0-9]+');
//});

Route::get('s/{id}','SongController@show')->where('id','[0-9]+');

Route::get('songs','SongController@index');

//
Route::get('upload', 'SongController@showUpload');

Route::post('upload', 'SongController@doUpload');

Route::get('listen',function(){
	return View::make('jplayer');
});
