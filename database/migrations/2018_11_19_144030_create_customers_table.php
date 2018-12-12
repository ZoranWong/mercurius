<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id')
                ->default(0)
                ->comment('店铺ID');
            $table->enum('platform_type', PLATFORM_TYPE_COLLECTION)
                ->default(WECHAT_OFFICIAL_ACCOUNT_USER)
                ->comment('第三方平台类型，0-微信，1-支付宝，2-新浪微博，3- Tencent QQ，4-facebook，5-twitter');
            $table->string('openid', 32)
                ->default('')
                ->comment('第三方平台openid或者userId');
            $table->string('nickname', 16)
                ->default('')
                ->comment('第三方平台昵称');
            $table->string('avatar', 256)
                ->default('')
                ->comment('第三方平台头像');

            $table->string('union_id', 32)
                ->default('')
                ->comment('多平台共享id，如微信公众号/小程序/三方登陆等');
            $table->json('region')
                ->nullable()
                ->default(null)
                ->comment("[
                'country' => null,
                'province' => null,
                'city' => null]");
            $table->unsignedInteger('member_id')
                ->default(0)
                ->comment('用户id（会员）');
            $table->enum('sex', ['UNKNOWN', 'MALE', 'FEMALE'])
                ->default('UNKNOWN')
                ->comment('性别');
            $table->timestamps();
            $table->softDeletes();
            $table->index('store_id');
            $table->index('platform_type');
            $table->index('openid');
            $table->index('union_id');
            $table->index('sex');
            $table->index('member_id');
        });
        DB::statement('ALTER TABLE `customers` COMMENT "第三方平台用户信息"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
