<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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
                ->comment('优惠券id');

            $table->unsignedInteger('store_id')
                ->default(0)
                ->comment('店铺id');
            $table->unsignedInteger('chain_store_id')
                ->default(0)
                ->comment('连锁店铺门店ID');
            $table->unsignedInteger('customer_id')
                ->comment('客户ID');

            $table->string('code', 32)
                ->unique()
                ->comment('优惠券优惠码');

            $table->enum('type', CARD_TYPE_COLLECTION)
                ->comment('优惠券类型');

            $table->enum('status', CARD_STATUS_COLLECTION)
                ->default(CARD_STATUS_EFFECTIVE)
                ->comment('优惠券状态');

            $table->timestamp('start_at')
                ->nullable()
                ->default(null)
                ->comment('开始时间');

            $table->timestamp('end_at')
                ->nullable()
                ->default(null)
                ->comment('结束时间');

            $table->json('card_info')
                ->nullable()
                ->default(null)
                ->comment("[
                    'discount' => 1,
                    'reduce_cost' => 0,
                    'least_cost' => 0,
                    'gift' => '',
                    'default_detail' => ''
                ]");

            $table->json('extend_info')
                ->nullable()
                ->default(null)
                ->comment("['merchandises' => [], 'activities' => []]");

            $table->timestamps();
            $table->softDeletes();
            $table->index('card_id');
            $table->index('store_id');
            $table->index('chain_store_id');
            $table->index('code');
            $table->index('status');
            $table->index('type');
            $table->index('start_at');
            $table->index('end_at');
        });
        DB::statement('ALTER TABLE `customer_coupons` COMMENT "用户优惠券"');
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
