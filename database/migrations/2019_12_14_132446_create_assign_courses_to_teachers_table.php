<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAssignCoursesToTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('assign_courses_to_teachers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('batch')->nullable()->foreign('batch')->references('id')->on('batch')->unsigned();
			$table->integer('section_id')->nullable()->foreign('section_id')->references('id')->on('sections')->unsigned();
			$table->integer('session_id')->nullable()->foreign('session_id')->references('id')->on('sessions')->unsigned();
			$table->integer('shift')->nullable()->foreign('shift')->references('id')->on('shifts')->unsigned();
			$table->integer('course_id')->nullable()->foreign('course_id')->references('id')->on('courses')->unsigned();
			$table->integer('study_program_id')->nullable()->foreign('study_program_id')->references('id')->on('study_program')->unsigned();
			$table->timestamps();
			$table->boolean('status')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::dropIfExists('assign_courses_to_teachers');
	}

}
