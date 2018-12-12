<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

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

            $table->unsignedInteger('chain_store_id')
                ->default(0)
                ->comment('连锁店铺门店');

            $table->unsignedInteger('store_id')
                ->default(0)
                ->comment('店铺');

            $table->enum('type', MEMBER_CARD_TYPE_COLLECTION)
                ->default(STORE_MEMBER_CARD)
                ->comment('会员卡类型：STORE_MEMBER_CARD - 平台会员卡， PLATFORM_MEMBER_CARD - 零售商城会员卡');

            $table->float('discount')->default(1)->comment('会员折扣');

            $table->string('balance_rules', 128)
                ->default('')
                ->comment('储值说明');

            $table->string('bonus_rules')
                ->default('')
                ->comment('积分规则说明');

            $table->json('custom_fields')
                ->nullable()
                ->default(null)
                ->comment('自定义会员信息类目，会员卡激活后显示,包含name_type,name和url字段');

            $table->json('bonus_rule')
                ->nullable()
                ->default(null)
                ->comment('积分规则：
                    cost_money_unit	否	int	消费金额。以元为单位。
                    increase_bonus	否	int	对应增加的积分。
                    max_increase_bonus	否	int	用户单次可获取的积分上限。
                    init_increase_bonus	否	int	初始设置积分。
                    cost_bonus_unit	否	int	每使用5积分。
                    reduce_money	否	int	抵扣xx元，（这里以元为单位）
                    least_money_to_use_bonus	否	int	抵扣条件，满xx元（这里以元为单位）可用。
                    max_reduce_bonus	否	int	抵扣条件，单笔最多使用xx积分。');

            $table->timestamps();
            $table->softDeletes();
            $table->index('chain_store_id');
            $table->index('store_id');
            $table->index('type');
        });
        DB::statement('ALTER TABLE `member_cards` COMMENT "会员卡"');
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
