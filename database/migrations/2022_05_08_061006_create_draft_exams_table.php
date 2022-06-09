<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDraftExamsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('draft_exams', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('teacher_id');
            $table->bigInteger('exam_id')->unsigned();
            $table->string('start_time');
            $table->string('end_time');
            $table->string('name');
            $table->boolean('status')->default(false); 
            $table->boolean('marked')->default(false); 
            $table->timestamps();
            $table->softDeletes();

            
            $table->foreign('exam_id')
            ->references('id')
            ->on('exams');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('draft_exams');
    }
}
