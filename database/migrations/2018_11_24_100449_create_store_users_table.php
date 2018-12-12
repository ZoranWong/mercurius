<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStoreUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id')
                ->comment('店铺ID');
            $table->string('name', 16)
                ->unique()
                ->comment('用户名');
            $table->string('mobile', 11)
                ->default('')
                ->comment('注册手机');
            $table->string('email')
                ->default('')
                ->comment('注册邮箱');
            $table->timestamp('email_verified_at')
                ->nullable()
                ->default(null)
                ->comment('邮箱认证时间');
            $table->string('nickname', 16)
                ->nullable()
                ->comment('昵称');
            $table->json('region')
                ->nullable()
                ->default(null)
                ->comment('区域');
            $table->enum('sex', ['UNKNOWN', 'MALE', 'FEMALE'])
                ->default('UNKNOWN')
                ->comment('性别');
            $table->unsignedInteger('vip')
                ->default(0)
                ->comment('vip等级');
            $table->string('password')->comment('密码');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->index('store_id');
            $table->index('name');
            $table->index('vip');
            $table->index('sex');
            $table->index('mobile');
            $table->index('email');
        });
        DB::statement('ALTER TABLE `store_users` COMMENT "平台用户表单"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_users');
    }
}
