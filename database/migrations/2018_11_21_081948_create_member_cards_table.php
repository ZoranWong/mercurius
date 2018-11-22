<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_cards', function (Blueprint $table) {
            $table->increments('id');
            $table->string('bg_image_url', 1024)
                ->default('')
                ->comment('背景图片');

            $table->unsignedInteger('shop_id')
                ->default(0)
                ->comment('店铺会员时填写');

            $table->unsignedInteger('store_id')
                ->default(0)
                ->comment('平台商城会员卡');

            $table->unsignedTinyInteger('type')
                ->default(0)
                ->comment('会员卡类型：0 - 平台商城会员卡， 1 - 零售商城会员卡， 2 - mercurius平台会员卡');

            $table->float('discount')->default(1)->comment('会员折扣');

            $table->string('balance_rules', 128)
                ->default('')
                ->comment('储值说明');

            $table->string('bonus_rules')
                ->default('')
                ->comment('积分规则说明');

            $table->json('custom_fields')
                ->default([])
                ->comment('自定义会员信息类目，会员卡激活后显示,包含name_type,name和url字段');

            $table->json('bonus_rule')
                ->default([])
                ->comment('积分规则：
                    cost_money_unit	否	int	消费金额。以分为单位。
                    increase_bonus	否	int	对应增加的积分。
                    max_increase_bonus	否	int	用户单次可获取的积分上限。
                    init_increase_bonus	否	int	初始设置积分。
                    cost_bonus_unit	否	int	每使用5积分。
                    reduce_money	否	int	抵扣xx元，（这里以分为单位）
                    least_moneytouse_bonus	否	int	抵扣条件，满xx元（这里以分为单位）可用。
                    max_reduce_bonus	否	int	抵扣条件，单笔最多使用xx积分。');

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
        Schema::dropIfExists('member_cards');
    }
}
