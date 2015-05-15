<?php

Class RoomController extends BaseController {

	// danh sach room dang phat
	public function index()
	{
		$data = Room::all();
		$live = Room::where('status',1)->get();
		return View::make('rooms',array('rooms' =>$data,'live'=>$live));
	}

	// show mot room
	public function show($id)
	{			
		$data = RoomRestful::show($id);
		//	return $data;
		return View::make('room',$data);

	}

	//join room ajax??
	public function joinRoom($id)
	{
		//gui thong tin room
		$roomRest = new RoomRestful;
		//thêm số player

		$room = Room::find($id);
		$room->increment('listeners');

		$room = RoomRestful::show($id);
		return Response::make($room, 200);
	}

	/**
	 * ajax| show setting
	 *
	 */
	public function showUpdate($id)
	{
		$room = Room::find($id);

		return View::make('ajax_setting',array('room'=>$room));
	}	

	//update setting of room
	// OK
	public function doUpdate($id)
	{
		$data = array(
			'title' => Input::get('title'),
			'genres' => Input::get('genres'),
			'intro' => Input::get('intro')
			);
		RoomRestful::update($id,$data);
		return Redirect::back();
	}


	/**
	 * start room 
	 *
	 */
	public function showStart($id)
	{	
		$room = Room::find($id);
		$playlist = $room->getPlaylist();
		if($playlist->isEmpty()) $playlist=false;
		return View::make('ajax_start')->with('playlist',$playlist);
	}

	/**
	 * start room
	 *
	 */
	public function doStart($id)
	{	
		$data = RoomRestful::show($id);

		//return time();
		if (Auth::id()!=$id) 
			return $this->toJson('False!!!');

		$room = Room::find($id);

		if($data['room']->status==1) 
			return $this->toJson('Room already live now!!!');


		$update = array(
			'status' => 1,
			'timestart' => time()
			);
		
		$data['room'] = RoomRestful::update($id,$update);

		// set current song
		$song_id = $data['room']->getPlaylist()->first()->id;

		//
		$room->songs()->updateExistingPivot($song_id,array("songstatus"=>1));

		//return Redirect::back();
		return $this->toJson('Start Success!!!');

		//return Response::make($room,200);
	}


	public function doOff($id)
	{
		//return time();
		if (Auth::id()!=$id) 
			return $this->toJson('False!!!');

		$room=Room::find($id);

		if($room->status==0) return $this->toJson('Room already off now!!!');
		
		$data = array(
			'status' => 0,
			'timestart' => 0
			);

		$room = RoomRestful::update($id,$data);
		$room->songs()->detach();

		//return Redirect::back();
		return $this->toJson('Turn Off Success!!!');

		//return Response::make($room,200);	
	}

	/**
	 * ajax| khi nguoi dung vote
	 *
	 */
	public function voteSong($id)
	{
		$song_id = Input::get('song_id');
		$room = Room::find($id);

		//return $room->songs->find($song_id);//->find($song_id);

		$rank =$room->songs->find($song_id)->pivot->rank+1; //TechBk Pro vai~ vai~

		$room->songs()->updateExistingPivot($song_id,array("rank"=>$rank));

		$playlist = $room->getPlaylist();

		return $this->toJson(View::make('ajax_playlist',array('songs'=>$playlist)));
	}

	/**
	 * ajax| add song
	 *
	 */
	public function addSong($id)
	{
		$song_id = Input::get('song_id');
		$room = Room::find($id);
		if($room->songs->find($song_id)!=null) {
			$playlist = $room->getPlaylist();
			return $this->toJson(View::make('ajax_playlist',array('songs'=>$playlist,'error'=>true)));
		}
			
		$room->songs()->attach($song_id, array('songstatus' => 0));

		$playlist = $room->getPlaylist();

		return $this->toJson(View::make('ajax_playlist',array('songs'=>$playlist,'error'=>false)));
	}

	public function getCurrentSong($id)
	{
		$data = RoomRestful::show($id);
		$data_1 = array(
			'currentSong'=>$data['currentSong'],
			'timestart'=>$data['timestart']
			);

		return $this->toJson($data_1);
	}

}