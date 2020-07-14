<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSessionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sessions', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('session_name', 45)->nullable()->comment('Summer, Spring ..etc');
			$table->date('session_start')->nullable()->comment('January');
			$table->date('session_end')->nullable();
			$table->string('session_code', 45)->nullable();
			$table->timestamps();
			$table->enum('status',array('active','inactive'))->default('active');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sessions');
	}

}
