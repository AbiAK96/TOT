<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTeachersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('school_id')->unsigned(); 
            $table->string('username');
            $table->string('email');
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->string('profile_image')->nullable();
            $table->string('city');
            $table->integer('zip_code');
            $table->boolean('is_activated')->default(true);
            $table->boolean('tfa_enabled')->default(false);
            $table->integer('email_verified_at')->nullable();
            $table->integer('mobile_verified_at')->nullable();
            $table->bigInteger('role_id')->unsigned();
            $table->bigInteger('teacher_type_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('school_id')
            ->references('id')
            ->on('schools');

            $table->foreign('role_id')
            ->references('id')
            ->on('roles');

            $table->foreign('teacher_type_id')
            ->references('id')
            ->on('teacher_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('teachers');
    }
}
