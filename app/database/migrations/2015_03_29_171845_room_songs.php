<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RoomSongs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('room_songs', function ($table) {
            $table->integer('room_id');                       
            $table->integer('song_id');
            $table->integer('songstatus')->default(0);//0 la chua phat, 1 dang phat, 2 da phat
            $table->integer('rank')->default(0);//rank theo vote
            $table->integer('like')->default(0);//like khi dang phat
            $table->nullableTimestamps();
        });
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('room_songs');
	}

}
