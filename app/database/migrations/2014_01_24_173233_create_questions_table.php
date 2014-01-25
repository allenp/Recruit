<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateQuestionsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('questions', function(Blueprint $table) {
            $table->engine = 'InnoDB';
			$table->increments('id');
			$table->integer('question_id')->references('id')->on('questions')->onDelete('cascade');
			$table->integer('user_id')->unsigned()->index()->references('id')->on('users');
			$table->integer('topic_id')->unsigned()->index()->references('id')->on('topics');
			$table->integer('editor_id')->unsigned()->references('id')->on('users');
			$table->integer('weight');
			$table->enum('type', array('Multiple', 'Short'));
			$table->enum('status', array('Accepted', 'Rejected', 'Pending'));
			$table->integer('level')->nullable();
			$table->text('question');
			$table->text('accepted_answers');
			$table->text('choices')->nullable();
			$table->integer('estimate_in_sec')->nullable();
			$table->float('difficulty')->nullable();
			$table->text('hint')->nullable();
			$table->text('instruction')->nullable();
			$table->text('explanation')->nullable();
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
		Schema::drop('questions');
	}

}
