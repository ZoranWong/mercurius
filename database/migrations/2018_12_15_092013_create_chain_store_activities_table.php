<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChainStoreActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chain_store_activities', function (Blueprint $table) {
            $table->unsignedInteger('chain_store_id')->comment('连锁店铺id');
            $table->unsignedBigInteger('activity_id')->comment('活动id');
            $table->softDeletes();
            $table->primary(['chain_store_id', 'activity_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chain_store_activities');
    }
}
