<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBankAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bank_accounts', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('store_user_id')->comment('用户id');
            $table->string('bank_name', 32)->comment('银行名称');
            $table->string('bank_account')->comment('银行账户');
            $table->string('mobile', 11)->comment('开户行手机号');
            $table->boolean('has_bind')
                ->default(false)
                ->comment('状态：false - 未绑定成功，true - 绑定成功');
            $table->timestamps();
            $table->softDeletes();
            $table->index('store_user_id');
            $table->index('bank_account');
            $table->index('mobile');
            $table->index('has_bind');
        });
        DB::statement('ALTER TABLE `bank_accounts` COMMENT "用户银行卡绑定表单"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bank_accounts');
    }
}
