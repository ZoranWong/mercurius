<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('order_id')->comment('订单id');
            $table->unsignedBigInteger('merchandise_id')->comment('商品ID');
            $table->unsignedBigInteger('merchandise_sku_id')
                ->default(0)
                ->comment('sku id');
            $table->float('total_amount')
                ->default(0)
                ->comment('合计金额');
            $table->unsignedInteger('quantity')
                ->default(1)
                ->comment('购买数量');
            $table->float('price')
                ->default(0)
                ->comment('单价');
            $table->json('detail')
                ->nullable()
                ->default(null)
                ->comment('产品信息');
            $table->enum('status', ORDER_STATUS_COLLECTION)
                ->default(WAIT_PAY_ORDER)
                ->comment('订单状态');
            $table->enum('type', ORDER_TYPE_COLLECTION)
                ->default(SCAN_QR_CODE_ORDER)
                ->comment('订单类型');
            $table->timestamps();
            $table->softDeletes();
            $table->index('order_id');
            $table->index('merchandise_id');
            $table->index('merchandise_sku_id');
            $table->index('status');
        });
        DB::statement('ALTER TABLE `order_items` COMMENT "订单详情表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_items');
    }
}
