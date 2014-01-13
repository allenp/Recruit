<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class PivotIntentInvitationTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intent_invitation', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('intent_id')->unsigned()->index();
			$table->integer('invitation_id')->unsigned()->index();
			$table->foreign('intent_id')->references('id')->on('intents')->onDelete('cascade');
			$table->foreign('invitation_id')->references('id')->on('invitations')->onDelete('cascade');
		});
	}



	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('intent_invitation');
	}

}
