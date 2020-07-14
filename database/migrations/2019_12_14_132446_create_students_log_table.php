<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudentsLogTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('students_log', function(Blueprint $table)
		{
			$table->bigIncrements('id');
			$table->bigInteger('student_id')->nullable()->foreign('students_id', 'student_id_slog')->references('id')->on('students');
			$table->integer('semester')->nullable()->foreign('semester', 'semester_id_slog')->references('id')->on('semesters');
			$table->integer('session')->nullable()->foreign('session', 'session_id_slog')->references('id')->on('sessions');
			$table->integer('section')->nullable()->foreign('section', 'section_id_slog')->references('id')->on('sections');
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


		Schema::drop('students_log');

	}

}
