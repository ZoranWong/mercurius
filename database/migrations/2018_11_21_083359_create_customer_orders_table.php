<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCustomerOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer_orders', function (Blueprint $table) {
<<<<<<< HEAD
            $table->increments('id');
            $table->string('order_no', 16)
                ->unique()
                ->comment('订单编号');
            $table->unsignedInteger('quantity')
                ->default(0)
                ->comment('购买数量');
            $table->float('total_amount')
                ->default(0)
                ->comment('合计金额');
            $table->float('discount_amount')
                ->default(0)
                ->comment('优惠金额');
            $table->float('payment_amount')
                ->default(0)
                ->comment('支付金额');
            $table->float('post_amount')
                ->default(0)
                ->comment('快递费用');
            $table->float('member_discount')
                ->default(1)
                ->comment('会员折扣');
            $table->unsignedInteger('customer_id')
                ->default(0)
                ->comment('买家id');
            $table->unsignedInteger('third_part_platform_user_id')
                ->default(0)
                ->comment('第三方平台用户表id');
            $table->unsignedInteger('store_id')
                ->comment('店铺id');
            $table->unsignedInteger('shop_id')
                ->default(0)
                ->comment('分店id');
            $table->json('receiver')
                ->default([
                    'address' => null,
                    'mobile' => null,
                    'name' => null,
                    'province' => '',
                    'city' => null,
                    'district' => null,
                    'post_code' => null
                ])
                ->comment('');
            $table->timestamp('signed_at')
                ->default(null)
                ->comment('签收时间');
            $table->enum('status', ORDER_STATUS_COLLECTION)
                ->default(WAIT_BUYER_PAY)
                ->comment('订单状态');
            $table->timestamps();
            $table->softDeletes();
=======
            $table->unsignedBigInteger('order_id')->comment('订单id');
            $table->unsignedInteger('customer_id')->comment('客户ID');
            $table->softDeletes();
            $table->primary(['customer_id', 'order_id']);
>>>>>>> 44419366de6820e7a7064fc723c19e4bb036a053
        });
        DB::statement('ALTER TABLE `customer_orders` COMMENT "用户订单关系表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer_orders');
    }
}
