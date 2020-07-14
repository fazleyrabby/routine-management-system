<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->integer('user_id')->nullable()->foreign('user_id')->references('id')->on('users')->unsigned();
			$table->integer('batch')->nullable()->foreign('batch')->references('id')->on('batch')->unsigned();
			$table->integer('current_semester')->nullable()->foreign('current_semester')->references('id')->on('semesters')->unsigned();
			$table->integer('current_session')->nullable()->foreign('current_session')->references('id')->on('sessions')->unsigned();
			$table->integer('current_section')->nullable()->foreign('current_section')->references('id')->on('sections')->unsigned();
			$table->integer('department')->nullable()->foreign('department')->references('id')->on('departments')->unsigned();
			$table->integer('study_program')->nullable()->foreign('study_program')->references('id')->on('study_program')->unsigned();
			$table->integer('current_shift')->nullable()->foreign('current_shift')->references('id')->on('shifts')->unsigned();
			$table->enum('status', array('active','inactive'))->default('active');
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
		Schema::drop('students');
	}

}
