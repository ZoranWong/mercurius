<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('title', 16)->comment('活动名称');
            $table->json('banners')->default([])->comment('活动banner图');
            $table->string('poster_image')->default('')->comment('大海报图片');
            $table->string('poster_page')->default('')->comment('海报页面');
            $table->timestamp('start_at')->comment('开始时间');
            $table->timestamp('end_at')->comment('结束时间');
            $table->enum('status', ACTIVITY_STATUS_COLLECTION)
                ->default(ACTIVITY_WAIT_RUN)
                ->comment('活动状态');
            $table->enum('type', ACTIVITY_TYPE_COLLECTION)
                ->comment('活动类型');
            $table->json('content')
                ->default([])
                ->comment('活动内容');
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
        Schema::dropIfExists('activities');
    }
}
