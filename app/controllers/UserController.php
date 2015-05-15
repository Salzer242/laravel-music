<?php
Class UserController extends BaseController {

	
	//public function index()
	//{
		//$data = UserRestful::index();
		//return View::make('users')->with('users', $data);
	//}

	public function show($id)
	{
		$data = User::find($id);
		if ($data==false) return "Không tồn tại người dùng ".$id." !!!";
		return View::make('user')->with('user', $data);
	}

	public function showRegister()
	{	
		return View::make('register');
	}

	public function doRegister()
	{
		
		$validator = Validator::make(Input::all(), User::$rules);

		// if the validator fails, redirect back to the form
		if ($validator->passes()){
			// validation has passed, save user in DB
			$data = UserRestful::store();
			//return Redirect::to('login')->with('user',$data);

			Session::flash('error_signup','Sign Up Success!!!');
			return Redirect::back();
	   	} else {
	   		
	   		Session::flash('error_signup','Validate failed!!!');
			return Redirect::back();
	        // validation has failed, display error messages
	        return Redirect::to('register')
	            ->withErrors($validator)
	            ->withInput(Input::except(array('password', 'email_confirmation', 'password_confirmation')));
	    }
	}

	public function showLogin()
	{	
		//Session::put("login_previous",URL::previous());
		// show the form
		return View::make('login');
	}

	public function doLogin()
	{

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), User::$rules_login);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
			Session::flash('error_login','Log In failed!!!');
			return Redirect::back();
			//return Redirect::to('login')
				//->withErrors($validator) // send back all errors to the login form
				//->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

			// create our user data for the authentication
			$userdata = array(
				'email' 	=> Input::get('email'),
				'password' 	=> Input::get('password')
			);

			// attempt to do the login
			if (Auth::attempt($userdata)) {

				// validation successful!
				// redirect them to the  section or whatever
				// return Redirect::to('secure');
				// for now we'll just echo success (even though echoing in a controller is bad)
				//$url_previous = Session::get("login_previous");
				//Session::forget("login_previous");
				//return Redirect::to($url_previous);
				return Redirect::back();
				//return Redirect::to(URL::previous()); //test

			} else {

				// validation not successful, send back to form
				//return Redirect::to('login');
				Session::flash('error_login','Log In failed!!!');
				return Redirect::back();
			}
		}
	}
	
	public function doLogout()
    {
        Auth::logout();
        return Redirect::back();
        //return Redirect::to('/');
    }

}