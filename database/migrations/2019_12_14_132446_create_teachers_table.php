<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTeachersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('teachers', function(Blueprint $table)
		{
			$table->increments('id');
			$table->integer('user_id')->nullable()->foreign('user_id')->references('id')->on('users');
            $table->integer('rank_id')->nullable()->foreign('rank_id')->references('id')->on('teacher_ranks');
            $table->enum('is_active',['1','0'])->default('1');
			$table->date('join_date')->nullable();
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
		Schema::dropIfExists('teachers');
	}

}
