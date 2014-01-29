<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotAccountCourseTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('account_course', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('account_id')->unsigned()->index();
			$table->integer('course_id')->unsigned()->index();
			$table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
			$table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('account_course');
	}

}
