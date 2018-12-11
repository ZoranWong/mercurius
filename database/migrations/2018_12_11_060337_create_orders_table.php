<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
                ->default(WAIT_PAY_ORDER)
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
            $table->index(['order_no', 'trade_no', 'outer_trade_no', 'status', 'type']);
        });
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
