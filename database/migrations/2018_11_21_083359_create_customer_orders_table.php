<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('order_id')->comment('订单id');
            $table->unsignedInteger('customer_id')->comment('客户ID');
            $table->softDeletes();
            $table->primary(['customer_id', 'order_id']);
        });
        DB::statement('ALTER TABLE `customer_orders` COMMENT "用户订单关系表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
