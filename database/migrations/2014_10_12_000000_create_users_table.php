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

            $table->string('name', 16)->comment('用户名');

            $table->string('mobile', 11)
                ->default('')
                ->index()
                ->comment('注册手机');

            $table->string('email')
                ->default('')
                ->index()
                ->comment('注册邮箱');

            $table->timestamp('email_verified_at')
                ->nullable()
                ->default(null)
                ->comment('邮箱认证时间');

            $table->string('nickname', 16)
                ->nullable()
                ->comment('昵称');

            $table->json('region')
                ->default([])
                ->comment('区域');

            $table->enum('sex', ['UNKNOWN', 'MALE', 'FEMALE'])
                ->default('UNKNOWN')
                ->index()
                ->comment('性别');
            $table->unsignedInteger('vip')
                ->default(0)
                ->index()
                ->comment('vip等级');

            $table->string('password')->comment('密码');

            $table->rememberToken();

            $table->timestamps();

            $table->softDeletes();
            $table->comment = '平台用户表单';
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
