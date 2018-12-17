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
                ->comment('');
            $table->timestamp('end_at')
                ->default(null)
                ->comment('');

            $table->json('card_info')
                ->default([
                    'discount' => 1,
                    'reduce_cost' => 0,
                    'least_cost' => 0,
                    'gift' => '',
                    'default_detail' => ''
                ])
                ->comment('');

            $table->json('extend_info')
                ->default([
                    'merchandises' => [],
                    'activities' => [],
                    'shops' => [],
                    'stores' => []
                ])
                ->comment('');
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
