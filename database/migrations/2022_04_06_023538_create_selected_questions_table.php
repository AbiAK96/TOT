<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSelectedQuestionsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('selected_questions', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('question_id');
            $table->bigInteger('question_type_id')->unsigned();
            $table->string('question');
            $table->string('answer_one');
            $table->string('answer_two');
            $table->string('answer_three');
            $table->string('answer_four');
            $table->integer('correct_answer');
            $table->timestamps();
            $table->softDeletes();
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
