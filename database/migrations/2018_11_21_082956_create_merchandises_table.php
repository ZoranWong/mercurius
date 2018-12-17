<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMerchandisesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchandises', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_id')->comment('店铺id');
            $table->string('merchandise_no', 12)->unique()->comment('产品编号');
            $table->string('name', 16)->comment('产品名称');
            $table->string('thumb_url')->default('')->comment('缩略图');
            $table->json('slider_images')->default([])->comment('轮播图');
            $table->json('sku')->default([])->comment('sku单品数据');
            $table->text('view')->default(null)->comment('产品详情');
            $table->float('sell_price')->default(0)->comment('售价');
            $table->float('origin_price')->default(0)->comment('原价');
            $table->float('member_price')->default(0)->comment('会员价');
            $table->unsignedInteger('sort')->default(0)->comment('排序');
            $table->unsignedInteger('stock_num')->default(0)->comment('库存');
            $table->float('max_price')->default(0)->comment('sku最大价格');
            $table->float('min_price')->default(0)->comment('sku最小价格');
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
        Schema::dropIfExists('merchandises');
    }
}
