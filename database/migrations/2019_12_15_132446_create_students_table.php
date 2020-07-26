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
			$table->integer('number_of_student');
			$table->integer('batch')->nullable()->foreign('batch')->references('id')->on('batch')->unsigned();
			$table->integer('current_shift')->nullable()->foreign('current_shift')->references('id')->on('shifts')->unsigned();
            $table->enum('is_active',['yes','no'])->default('yes');
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
		Schema::dropIfExists('students');
	}

}
