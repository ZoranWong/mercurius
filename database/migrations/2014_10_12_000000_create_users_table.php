<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('name');
            $table->string('mobile', 11)
                ->nullable()
                ->comment('注册手机');
            $table->string('email')
                ->nullable()
                ->comment('注册邮箱');
            $table->timestamp('email_verified_at')
                ->nullable()
                ->comment('邮箱认证时间');
            $table->string('nickname', 16)
                ->nullable()
                ->comment('昵称');
            $table->json('region')
                ->default([])
                ->comment('区域');
            $table->enum('sex', ['UNKNOWN', 'MALE', 'FEMALE'])
                ->default('UNKNOWN')
                ->comment('性别');
            $table->json('roles')
                ->default([])
                ->comment('角色');
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
