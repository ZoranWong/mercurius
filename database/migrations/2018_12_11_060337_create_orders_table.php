<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_no', 18)
                ->unique()
                ->comment('订单编号');
            $table->string('trade_no', 20)
                ->default('')
                ->comment('支付平台交易号');
            $table->string('outer_trade_no', 18)->comment('多订单支付唯一标示');
            $table->enum('status', ORDER_STATUS_COLLECTION)
                ->default(WAIT_BUYER_PAY)
                ->comment('订单状态');
            $table->enum('type', ORDER_TYPE_COLLECTION)
                ->default(BOOKING_ORDER)
                ->comment('订单类型');
            $table->float('total_amount')
                ->default(0)
                ->comment('金额总计');
            $table->float('payment_amount')
                ->default(0)
                ->comment('实际支付金额');
            $table->float('discount_amount')
                ->default(0)
                ->comment('优惠金额');
            $table->timestamps();
            $table->softDeletes();
            $table->index('order_no');
            $table->index('trade_no');
            $table->index('outer_trade_no');
            $table->index( 'status');
            $table->index('type');
        });
        DB::statement('ALTER TABLE `orders` COMMENT "订单表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
