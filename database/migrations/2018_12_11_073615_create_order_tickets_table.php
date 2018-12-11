<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_tickets', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->comment('订单ID');
            $table->unsignedBigInteger('ticket_id')->comment('优惠券ID');
            $table->float('discount_amount')->comment('优惠券金额');
            $table->timestamps();
            $table->softDeletes();
            $table->comment = '订单优惠券使用表';
            $table->index('order_id');
            $table->index('ticket_id');
            $table->unique(['order_id', 'ticket_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_tickets');
    }
}
