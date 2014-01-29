<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTopicsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('topics', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('course_id')->references('id')->on('courses')->unsigned();
            $table->string('name');
            $table->string('permalink');
            $table->boolean('multiple_choice')->default(1);
            $table->boolean('short_answer')->default(1);
            $table->text('description')->nullable();
            $table->boolean('active')->default(0);
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
        Schema::drop('topics');
    }

}
