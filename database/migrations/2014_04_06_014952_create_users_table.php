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
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('mobile_number')->nullable();
            $table->string('city')->nullable();
            $table->string('profile_image')->nullable();
            $table->integer('zip_code')->nullable();
            $table->boolean('tfa_enabled')->default(false);
            $table->integer('email_verified_at')->nullable(); 
            $table->bigInteger('teacher_type_id')->unsigned()->nullable();
            $table->integer('mobile_verified_at')->nullable();
            $table->bigInteger('role_id')->unsigned();
            $table->string('remember_token')->nullable();
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
