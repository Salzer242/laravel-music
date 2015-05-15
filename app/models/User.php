<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait;


	protected $fillable = array('username', 'email','password','role_id');

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password', 'remember_token');

	public static $rules = array(
	    'email'=>'required|email|unique:users,email|confirmed',
	    'email_confirmation'=>'required|email',

	    'username'=>'required|alpha_num|between:3,32',

	    'password'=>'required|alpha_num|between:6,64|confirmed',
	    'password_confirmation'=>'required|alpha_num|between:6,64'
    );

	public static $rules_login = array(
	    'email'=>'required|email',
	    'password'=>'required|alpha_num|between:6,64',
	    
    );

	//relation toi roles
	public function roles()
    {
        return $this->belongsTo('Role');
    }

    //relation toi room
    public function room()
    {
    	return $this->hasOne('Room');
    }

    /**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}
}
