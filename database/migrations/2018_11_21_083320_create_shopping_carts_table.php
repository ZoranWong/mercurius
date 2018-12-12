<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateShoppingCartsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shopping_carts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code', 18)->comment('编码');
            $table->unsignedInteger('customer_id')->comment('消费者ID');
            $table->unsignedInteger('store_id')->comment('店铺ID');
            $table->unsignedInteger('chain_store_id')->default(0)->comment('连锁店铺ID');
            $table->json('carts')->comment('购买商品列表');
            $table->float('total_amount')->default(0)->comment('购物车金额总计');
            $table->timestamps();
            $table->index('customer_id');
            $table->index('store_id');
            $table->index('chain_store_id');
        });
        DB::statement('ALTER TABLE `shopping_carts` COMMENT "购物车"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_carts');
    }
}
