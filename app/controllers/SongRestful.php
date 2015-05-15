<?php

Class SongRestful extends BaseController {

	/**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public static function index()
    {
    	//try{

        //$statusCode = 200;
        return Song::all()->take(10);
        
        

    	//}catch (Exception $e){
        //	$statusCode = 404;
    	//}finally{
        //	return Response::make($response, $statusCode);
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
    public static function store($pathsong,$duration)
    {
        $songData = array(
            'songname' => Input::get('songname'), 
            'artist' => Input::get('artist'),
            'genres' => Input::get('genres'),
            'album' => Input::get('album'),
            'pathsong' => $pathsong,
            
            'duration' => $duration,
            
            );

        //$user = new User($userData);
        //$user->save();
        $song = Song::create($songData);

       

        return $song;
    }
 
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public static function show($id)
    {
        
         
        return Song::find($id);
         
    	
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
     * @param  int  $id
     * @return Response
     */
    public static function update($id,array $data)
    {
        $song = Song::find($id);
        $song->update($data);
        return true;
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