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
			$table->integer('session_id')->nullable()->foreign('session_id')->references('id')->on('yearly_sessions')->unsigned();
			$table->integer('teacher_id')->nullable()->foreign('teacher_id')->references('id')->on('teachers')->unsigned();
			$table->integer('course_id')->nullable()->foreign('course_id')->references('id')->on('courses')->unsigned();
			$table->integer('batch_id')->nullable()->foreign('batch_id')->references('id')->on('batch')->unsigned();
			$table->timestamps();
            $table->enum('is_active',['yes','no'])->default('yes');
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
