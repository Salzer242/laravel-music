<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showWelcome()
	{
		return View::make('hello');
	}
	
	public function show()
	{	
		if(Auth::check()){
			$userroom = Room::find(Auth::id());
		}else{
			$userroom = false;
		}
		$rooms = RoomRestful::index();
		$songs = SongRestful::index();
		return View::make('home',array('rooms' => $rooms, 'songs'=>$songs, 'userroom'=>$userroom));
	}
}
