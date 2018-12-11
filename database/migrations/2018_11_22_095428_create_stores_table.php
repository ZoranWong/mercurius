<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->enum('type')->comment('店铺类型');
            $table->timestamps();
            $table->softDeletes();
            $table->comment = 'stores店铺';
        });
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
