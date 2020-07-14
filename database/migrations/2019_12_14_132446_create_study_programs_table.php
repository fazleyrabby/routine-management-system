<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateStudyProgramsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('study_programs', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('study_program_name', 45)->nullable()->comment('BSC, MSC, BBA, MBA..etc');
			$table->string('study_program_code', 45)->nullable();
			$table->enum('status', ['active', 'inactive'])->default('active');
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
		Schema::drop('study_programs');
	}

}
