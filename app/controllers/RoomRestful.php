<?php
Class RoomRestful extends BaseController {

	/**
     * Display a listing of the resource.
     * Lay danh sach room
     *
     * @return Response
     */
    public static function index()
    {
    	//try{

            //$statusCode = 200;
        return Room::all()->take(10);
 
    	//}catch (Exception $e){
        	//$statusCode = 404;
    	//}finally{
        	//return Response::make($response, $statusCode);
    	//}
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public static function create()
    {
    	
    }
 
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public static function store($user)
    {
    	$roomData = array(
            "title" => "".$user->username." room",
            "intro" => "This is ".$user->username." room"
            );

        //attach moi quan he
        $room = new Room($roomData);

        return $user->room()->save($room);
    }
 
    /**
     * Display the specified resource.
     * show mot room nhac
     *
     * @param  int  $id
     * @return Response
     */
    public static function show($id)
    {

        //tinh toan lai bai hat hien tai, set lai time start
        //$room = Room::find($id)->with('songs');

        $room = Room::find($id);    // thu ko with song
        $currentSong = $room->getCurrentSong();
        if($currentSong->isEmpty()) $currentSong=false;
            else $currentSong=$currentSong->first();
        $playlist = $room->getPlaylist();
        

        //if() //neu không tồn tại thi return
        
        //lay list nhac
        //$songs = RoomSongRestful::index($id);

        if($room->status==0) return array(//room chua start
                'room'=>$room,
                'currentSong'=>$currentSong,
                'playlist'=>$playlist,
                'timestart'=>0
                );

        if(($currentSong==false)&&($playlist->isEmpty()))  
        {//HET BAI HAT DE PHAT CHUYEN TRANG THAI ROOM
            
            $data = array(
            'status' => 0,
            'timestart' => 0
            );

            $room->update($data);

            return array(
                'room'=>$room,
                'currentSong'=>$currentSong,
                'playlist'=>$playlist,
                'timestart'=>0
                );

        }

        if($currentSong==false)
        {
            $room->songs()->updateExistingPivot($playlist->first()->id,array("songstatus"=>1));
            $room->timestart= time();
            $room->save();
        }

        $time1 = 0;
        $time2 = $currentSong->duration;
        $amountTime = time()-$room->timestart;//thoi gian tu luc bat dau

        if($time2>$amountTime)//neu cai hat hien tai co time qua' thoi gian tu luc bat dau thi chua co thay doi
        {
            $amountTime;
            return array(
                'room'=>$room,
                'currentSong'=>$currentSong,
                'playlist'=>$playlist,
                'timestart'=>$amountTime
                );   //return list ko thay doi
        }

        //set current song thanh played song
        $room->songs()->updateExistingPivot($currentSong->id,array("songstatus"=>2));

        if(!($playlist->isEmpty())){
            //duyet laylist kiem tra cac bai hat da~ phat
            foreach ($playlist as $song) {
                $time1=$time2;
                $time2+=$song->duration;

                if( ($amountTime<=$time2) && ($amountTime>=$time1) )
                {
                    $room->songs()->updateExistingPivot($song->id,array("songstatus"=>1));
                    //set this song is current song
                    break;
                }
                //set thanh bai hat da phat
                $room->songs()->updateExistingPivot($song->id,array("songstatus"=>2));
                //$room->songs()->detach($song->id);
            }

            

        }
        
        $playedSong = $room->getPlayedSong();

        foreach ($playedSong as $song) {
            $room->timestart+=$song->duration;
            $room->songs()->detach($song->id);//xoa bai hat di
        }

        //luu lai sau khi thay doi timestart
        $room->save();

       

        //lay lai rooms
        $room = Room::find($id);    // thu ko with song
        $currentSong = $room->getCurrentSong()->first();
        //$currentSong=$currentSong->first();
        $playlist = $room->getPlaylist();
        $amountTime = time()-$room->timestart;//thoi gian tu luc bat dau
        return array(
                'room'=>$room,
                'currentSong'=>$currentSong,
                'playlist'=>$playlist,
                'timestart'=>$amountTime
                );   

    }
 
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public static function edit($id)
    {
    	
        //
    }
 
    /**
     * Update the specified resource in storage.
     *
     *
     * @param  int  $id
     * @return Response
     */
    public static function update($id,array $data)
    {
        $room = Room::find($id);
        $room->update($data);
        return $room;
    }
 
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public static function destroy($id)
    {
      //
    }
}