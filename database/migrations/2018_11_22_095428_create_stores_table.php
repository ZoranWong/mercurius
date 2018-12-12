<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateStoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /**
         * stores店铺
         * */
        Schema::create('stores', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 16)->comment('店铺名称');
            $table->boolean('is_chain_store')->default(false)->comment('是否连锁店铺');
            $table->enum('type', STORE_TYPE_COLLECTION)
                ->default(ONLINE_SHOPPING_MALL)
                ->comment('店铺类型');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement('ALTER TABLE `stores` COMMENT "店铺表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stores');
    }
}
