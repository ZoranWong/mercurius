<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->unsignedInteger('customer_id')
                ->index()
                ->comment('购买者id');
            $table->enum('type', SHOPPING_CART_TYPE_COLLECTION)
                ->default(BOOKING_SHOPPING_CART)
                ->comment('购物车类型');
            $table->json('merchandises')
                ->comment('购物车商品信息');
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
        Schema::dropIfExists('shopping_carts');
    }
}
