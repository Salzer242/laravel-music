 <?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Rooms extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('rooms', function ($table) {

            $table->increments('id');

            $table->integer('user_id');

            $table->string('title',100)->default("Room Title");
            $table->string('genres',50)->default("Room Genres");//the loai nhac
            $table->string('intro',300)->default("Room Intro");//gioi thieu
            $table->integer('rank')->default(0);
            
            $table->integer('status')->default(0);//trang thai dang phat hay ko?
            //$table->time('timestart')->default(DB::raw('CURRENT_TIMESTAMP'));//thoi diem phat
            $table->integer('timestart')->nullable();
            $table->integer('listeners')->default(0);//so nguoi nghe hien tai
            $table->integer('plays')->default(0);//so bai da play
            

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
		Schema::drop('rooms');
	}

}
