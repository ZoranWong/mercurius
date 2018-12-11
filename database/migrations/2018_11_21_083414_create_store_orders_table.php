<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
