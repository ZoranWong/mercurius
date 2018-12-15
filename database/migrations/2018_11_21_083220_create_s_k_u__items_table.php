<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateSKUItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('s_k_u_items', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id')->comment('店铺ID');
            $table->unsignedInteger('merchandise_id')->comment('商品ID');
            $table->string('code', 12)->comment('编码');
            $table->json('spec')->default(null)->comment('规格');
            $table->float('origin_price')->default(0)->comment('原价');
            $table->float('sell_price')->default(0)->comment('售价');
            $table->float('member_price')->default(0)->comment('会员价');
            $table->timestamps();
            $table->softDeletes();
            $table->index('merchandise_id');
            $table->index('code');
        });
        DB::statement('ALTER TABLE `s_k_u_items` COMMENT "sku表单"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchandise_s_k_u');
    }
}
