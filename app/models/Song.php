<?php
use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
class Song extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;

	protected $fillable = array('songname', 'artist','album','genres','pathsong','duration');

	protected $table = 'songs';

	


	public function rooms()
	{
		return $this->belongsToMany('Room','room_songs')->withPivot('songstatus','rank','like');
	}
}