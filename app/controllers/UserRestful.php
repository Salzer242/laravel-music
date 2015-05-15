<?php
Class UserRestful extends BaseController {

	/**
	  * Display a listing of the resource.
	  *
	  * @return Response
	  */
	public static function index()
	{
		//try{

        	//$statusCode = 200;
        	return User::all()->take(10);
 
    	//}catch (Exception $e){
        	//$statusCode = 404;
    	//}finally{
        	//return $response;
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
	    return View::make('register');
	}
	 
	/**
	  * Store a newly created resource in storage.
	  *
	  * @return Response
	  */
	public static function store()
	{

	    //try{
        //$statusCode = 200;
        $userData = array(
        	'username' => Input::get('username'), 
        	'email' => Input::get('email'),
        	'password' => Hash::make(Input::get('password')),
        	'role_id' => 1
        	);

        //$user = new User($userData);
        //$user->save();
        $user = User::create($userData);

        //tao room moi
        $roomRestful = new RoomRestful;
        $room = RoomRestful::store($user);

        return $user;

    	//}catch (Exception $e){
        //	$statusCode = 404;
    	//}finally{
        //	return Response::make($user, $statusCode);
    	//}
	}
	 
	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public static function show($id)
	{
	    //try{

        //$statusCode = 200;
       	return User::find($id);
 
 
    	//}catch (Exception $e){
        //	$statusCode = 404;
    	//}finally{
        //	return Response::make($response, $statusCode);
    	//}
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
		$user = User::find($id);
        $user->update($data);
        //return 
	    //
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