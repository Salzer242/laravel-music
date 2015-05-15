<?php

class Room extends Eloquent {
	
	protected $fillable = array('title', 'intro','genres','status','timestart','listeners');

	protected $table = 'rooms';

	public function user()
	{
		return $this->belongsTo('User');
	}

	public function songs()
	{
		return $this->belongsToMany('Song','room_songs')->withPivot('songstatus','rank','like')->orderBy('rank', 'desc');
	}

	public function getCurrentSong()
	{
		return $this->songs()->wherePivot('songstatus',1)->get();
	}

	public function getPlaylist()
	{
		return $this->songs()->wherePivot('songstatus',0)->get();
	}

	public function getPlayedSong()
	{
		return $this->songs()->wherePivot('songstatus',2)->get();
	}
}