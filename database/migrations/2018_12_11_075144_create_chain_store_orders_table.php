<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateChainStoreOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chain_store_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('chain_store_id')->comment('新零售连锁店铺分店id');
            $table->unsignedBigInteger('order_id')->comment('订单ID');
            $table->softDeletes();
            $table->primary(['chain_store_id', 'order_id']);
        });
        DB::statement('ALTER TABLE `chain_store_orders` COMMENT "连锁店铺订单关系"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chain_store_orders');
    }
}
