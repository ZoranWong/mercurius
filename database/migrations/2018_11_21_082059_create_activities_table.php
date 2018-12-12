<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('activities', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('store_id')
                ->default(0)
                ->comment('活动ID');
            $table->string('name', 16)
                ->comment('活动名称');
            $table->json('act_info')
                ->nullable()
                ->default(null)
                ->comment('活动信息');
            $table->timestamp('start_at')->nullable()->default(null)->comment('开始时间');
            $table->timestamp('end_at')->nullable()->default(null)->comment('结束时间');
            $table->enum('status', ACTIVITY_STATUS_COLLECTION)
                ->default(ACTIVITY_WAIT)
                ->comment('状态');
            $table->timestamps();
            $table->softDeletes();
            $table->index('store_id');
            $table->index('start_at');
            $table->index('end_at');
            $table->index('status');
        });
        DB::statement('ALTER TABLE `activities` COMMENT "活动表"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('activities');
    }
}
