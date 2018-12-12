<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStoreOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('store_id')->comment('店铺ID');
            $table->unsignedBigInteger('order_id')->comment('订单id');
            $table->timestamps();
            $table->softDeletes();
            $table->index('store_id');
            $table->index('order_id');
            $table->unique(['store_id', 'order_id']);
        });
        DB::statement('ALTER TABLE `store_orders` COMMENT "店铺订单关系表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_orders');
    }
}
