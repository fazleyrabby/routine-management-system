<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateClassScheduleTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('class_schedule', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('teacher_id')->nullable()->foreign('teacher_id')->references('id')->on('teachers');
			$table->integer('room_id')->nullable()->foreign('room_id')->references('id')->on('rooms');
			$table->integer('course_id')->nullable()->foreign('course_id')->references('id')->on('courses');
			$table->date('date')->nullable();
			$table->time('start_time')->nullable();
			$table->time('end_time')->nullable();
			$table->boolean('status')->nullable();
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('class_schedule');
	}

}
