<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('id');
            $table->bigInteger('school_id')->unsigned();
            $table->string('email');
            $table->string('password');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('mobile_number');
            $table->string('city');
            $table->string('profile_image');
            $table->integer('zip_code');
            $table->boolean('tfa_enabled')->default(false);
            $table->integer('email_verified_at')->nullable(); 
            $table->integer('teacher_type_id')->unsigned()->nullable();
            $table->integer('mobile_verified_at')->nullable();
            $table->bigInteger('role_id')->unsigned();
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
        Schema::dropIfExists('users');
    }
}
