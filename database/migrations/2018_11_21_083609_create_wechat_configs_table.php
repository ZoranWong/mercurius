<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateWechatConfigsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wechat_configs', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id')->comment('店铺id');
            $table->string('app_id', 18)->comment('微信配置app id');
            $table->string('app_secret', 32)->comment('微信app secret');
            $table->enum('type', WECHAT_CONFIG_TYPE_COLLECTION)
                ->default(WECHAT_OFFICIAL_ACCOUNT_USER)
                ->comment('类型：小程序/公众号');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement('ALTER TABLE `wechat_configs` COMMENT "微信配置"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('wechat_configs');
    }
}
