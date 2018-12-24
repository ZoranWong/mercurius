<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
            $table->string('code', 10)->unique()->comment('产品编号');
            $table->unsignedInteger('store_id')->comment('店铺ID');
            $table->string('name', 16)->comment('产品名称');
            $table->float('origin_price')->default(0)->comment('原价');
            $table->float('sell_price')->default(0)->comment('售价');
            $table->float('member_price')->default(0)->comment('会员价');
            $table->string('preview', 256)->default('')->comment('简介');
            $table->text('detail')->nullable()->default(null)->comment('详情');
            $table->timestamps();
            $table->softDeletes();
            $table->index('code');
            $table->index('store_id');
        });
        DB::statement('ALTER TABLE `merchandises` COMMENT "商品表"');
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
