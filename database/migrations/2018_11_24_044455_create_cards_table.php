<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_id', 32)
                ->default('')
                ->comment('微信卡券id（cardId）');
            $table->enum('card_type', [])
                ->default('')
                ->comment('卡券类型');
            $table->unsignedInteger('stock_num')
                ->default(0)
                ->comment('库存数量');
            $table->unsignedInteger('issue_num')
                ->default(0)
                ->comment('发行数量');
            $table->json('base_info')
                ->default([])
                ->comment('卡券基本信息');
            $table->json('card_info')
                ->default([
                'discount' => 1,
                'gift' => '',
                'reduce_cost' => 0,
                'least_cost' => 0])
                ->comment('卡券信息');
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
        Schema::dropIfExists('cards');
    }
}
