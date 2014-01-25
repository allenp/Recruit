<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTestsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('teacher_id')->nullable();
            $table->integer('subject_id');
            $table->integer('topic_id');
            $table->timestamp('started_at');
            $table->timestamp('finished_at')->nullable();
            $table->float('percentage')->default(0);
            $table->boolean('marked')->default(false);
            $table->string('weight')->nullable();
            $table->string('format', 30);
            $table->integer('max_questions')->default(10);
            $table->integer('page_size')->default(5);
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
        Schema::drop('tests');
    }

}
