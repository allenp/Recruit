<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEnrollmentsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('enrollments', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('user_id')->references('id')->on('users');
			$table->integer('course_id')->refernces('id')->on('courses');
            $table->boolean('approved');
            $table->integer('approved_by')->references('id')->on('users');
			$table->timestamp('approved_dt');
			$table->timestamps();
            $table->unique(array('user_id', 'course_id'));
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('enrollments');
	}

}
