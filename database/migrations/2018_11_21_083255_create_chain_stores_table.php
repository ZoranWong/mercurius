<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateChainStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * chain_stores指一般个体商店（可以是独立店铺或者平台商店的连锁/分销/代理店铺）
         * */
        Schema::create('chain_stores', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id')->comment('店铺名称');
            $table->string('chain_store_no')->unique()->comment('门店编号');
            $table->string('name', 16)->comment('店铺/门店/自提点名称');
            $table->string('open_at', 5)->default('')->comment('开张时间');
            $table->string('close_at', 5)->default('')->comment('打烊时间');
            $table->string('address')->comment('店铺地址');
            $table->point('position')->default(null)->comment('位置');
            $table->float('total_money')->default(0)->comment('累计金额');
            $table->float('balance_money')->default(0)->comment('余额');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement('ALTER TABLE `chain_stores` COMMENT "连锁店铺"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
