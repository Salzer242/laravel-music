<?php

/**
 * quan ly list nhac moi room.
 */
Class RoomSongRestful extends BaseController {

	/**
     * Display a listing of the resource.
     * thong tin cua list room
     * 
     * @return Response
     */
    public static function index($id)
    {
    	//try{

            //$statusCode = 200;
            //lay list bai hat chua phat
            //if(Room::find($id))
            $playlist = Room::find($id)->songs()
                ->wherePivot('songstatus','=',0)->sortBy(function($song)
                    {
                        $song->pivot->
                    }'rank');

            $currentsong = Room::find($id)->songs()
                ->wherePivot('songstatus','=',1)->get();

            //$playedsong = Room::find($id)->songs()
                //->wherePivot('songstatus','=',2)->get()->sortBy('update_at');
 
       // }catch (Exception $e){
            //$statusCode = 404;
        //}finally{
            $songs = array(
                //'statusCode' => $statusCode,
                //'playedsong' => $playedsong,
                'currentsong' => $currentsong,
                'playlist' => $playlist
                );
            return $songs;
            //return Response::make($response, $statusCode);
        //}
    }
 
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
    
    }
 
    /**
     * Store a newly created resource in storage.
     * Tao danh sach ban dau
     * Playlist la danh sach bai hat dc gui ve 
     *
     * @return Response
     */
    public static function store($id,$playlist)
    {
    	//try{

            //$statusCode = 200;
            //tao list ban dau
            $room = Room::find($id);
            foreach ($playlist as $key => $value) {
                $room->songs()->attach($value);//lay bai dau tien
            }
            //set bai hat dau tien
            $room->songs()->updateExistingPivot($room->songs()->first()->id,array("songstatus"=>1));

            return index($id);


            
 
        //}catch (Exception $e){
            //$statusCode = 404;
        //}finally{
            //return Response::make($response, $statusCode);
        //} 
    }
 
    /**
     * Display the specified resource.
     * thong tin current song
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        
    }
 
    /**
     * Show the form for editing the specified resource.
     * 
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
    	
        
    }
 
    /**
     * Update the specified resource in storage.
     * chinh sua lau list nhac 
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id)
    {
      
    }
 
    /**
     * Remove the specified resource from storage.
     * xoa toan bo list nhac
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      //
    }
}