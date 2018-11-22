<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->comment('用户id');
            $table->unsignedInteger('member_card_id')->comment('会员卡id');
            $table->float('balance', 16, 4)
                ->default(0)
                ->comment('余额');
            $table->float('total_amount', 16, 4)
                ->default(0)
                ->comment('账户累计金额');
            $table->float('total_withdraw_amount')
                ->default(0)
                ->comment('累计提现金额');
            $table->float('total_consumption_amount')
                ->default(0)
                ->comment('累计消费金额');
            $table->float('total_charge_amount')
                ->default(0)
                ->comment('累计充值');
            $table->unsignedInteger('last_score')
                ->default(0)
                ->comment('剩余积分');
            $table->unsignedInteger('can_use_score')
                ->default(0)
                ->comment('可用积分');
            $table->unsignedInteger('total_score')
                ->default(0)
                ->comment('累计总积分');
            $table->unsignedInteger('used_score')
                ->default(0)
                ->comment('累计已使用积分');
            $table->timestamps();
            $table->softDeletes();
            $table->comment = '用户账户表单';
            $table->unique(['user_id', 'member_card_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_accounts');
    }
}
