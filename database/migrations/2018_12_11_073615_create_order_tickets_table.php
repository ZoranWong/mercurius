<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->unsignedBigInteger('order_id')->comment('订单ID');
            $table->unsignedBigInteger('ticket_id')->comment('优惠券ID');
            $table->float('discount_amount')->comment('优惠券金额');
            $table->softDeletes();
            $table->primary(['order_id', 'ticket_id']);
        });
        DB::statement('ALTER TABLE `order_tickets` COMMENT "订单优惠券使用表"');
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
