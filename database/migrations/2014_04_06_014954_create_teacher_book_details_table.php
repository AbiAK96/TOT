<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeacherBookDetailsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teacher_book_details', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('teacher_id')->unsigned();
            $table->bigInteger('book_id')->unsigned();
            $table->string('date');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('teacher_id')
            ->references('id')
            ->on('users');

            $table->foreign('book_id')
            ->references('id')
            ->on('books');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('schools');
    }
}
