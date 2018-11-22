<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * shops指一般个体商店（可以是独立店铺或者平台商店的连锁/分销/代理店铺）
         * */
        Schema::create('shops', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->comment = 'shops指一般个体商店(可以是独立店铺或者平台商店的连锁/分销/代理店铺)';
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shops');
    }
}
