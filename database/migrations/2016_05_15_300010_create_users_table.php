<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

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
            $table->increments('id');
            $table->integer('owner_id')->unsigned()->index('owner_id');
            $table->foreign('owner_id')->references('id')->on('owners')->onUpdate('restrict')->onDelete('restrict');
            $table->integer('role_id')->unsigned()->index('roles_id');
            $table->foreign('role_id')->references('id')->on('roles')->onUpdate('restrict')->onDelete('restrict');
            $table->string('email');
            $table->string('password')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('phone')->nullable();
            $table->string('nin')->nullable();
            $table->boolean('is_active')->default(0);
            $table->string('api_token', 60)->nullable();
            $table->rememberToken();
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
        Schema::drop('users');
    }
}
