<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateThirdPartyPlatformUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('third_party_platform_users', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedTinyInteger('platform_type')
                ->nullable()
                ->default(0)
                ->comment('第三方平台类型，0-微信，1-支付宝，2-新浪微博，3- Tencent QQ，4-facebook，5-twitter');
            $table->string('openid', 128)
                ->nullable()
                ->default('')
                ->comment('第三方平台openid或者userId');
            $table->string('nickname', 16)
                ->default('')
                ->comment('第三方平台昵称');
            $table->string('avatar', 256)
                ->default('')
                ->comment('第三方平台头像');

            $table->string('union_id', 128)
                ->default('')
                ->comment('多平台共享id，如微信公众号/小程序/三方登陆等');
            $table->json('region')->default([
                'country' => null,
                'province' => null,
                'city' => null])
                ->comment('所属区域');
            $table->unsignedInteger('user_id')
                ->default('')
                ->comment('用户id（会员）');
            $table->enum('sex', ['UNKNOWN', 'MALE', 'FEMALE'])
                ->default('UNKNOWN')
                ->comment('性别');

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
        Schema::dropIfExists('third_party_platform_users');
    }
}
