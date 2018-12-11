<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('card_id', 32)
                ->index()
                ->comment('优惠券id');

            $table->unsignedInteger('store_id')
                ->default(0)
                ->comment('店铺id');
            $table->unsignedInteger('customer_id')
                ->comment('客户ID');

            $table->string('code', 32)
                ->unique()
                ->comment('优惠券优惠码');

            $table->enum('type', CARD_TYPE_COLLECTION)
                ->index()
                ->comment('优惠券类型');

            $table->enum('status', CARD_STATUS_COLLECTION)
                ->default(CARD_STATUS_EFFECTIVE)
                ->index()
                ->comment('优惠券状态');

            $table->timestamp('start_at')
                ->default(null)
                ->comment('开始时间');

            $table->timestamp('end_at')
                ->default(null)
                ->comment('结束时间');

            $table->json('card_info')
                ->default([
                    'discount' => 1,
                    'reduce_cost' => 0,
                    'least_cost' => 0,
                    'gift' => '',
                    'default_detail' => ''
                ])->comment('卡券信息');

            $table->json('extend_info')
                ->default(['merchandises' => [], 'activities' => []])
                ->comment('拓展信息');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_coupons');
    }
}
