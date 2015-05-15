<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Songs extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('songs', function ($table) {
            $table->increments('id');
            
            $table->integer('duration')->default(0);//time cua bai hat
            $table->string('songname');
            
            $table->string('artist')->default("no artist");
            $table->string('album')->default("no album");
            $table->string('genres',64)->default("no genres");//the loai
            
            $table->integer('listened')->default(0);//so luot da nghe
            $table->string('pathsong',256)->nullable();//duong dan
            
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
		Schema::drop('songs');
	}

}
