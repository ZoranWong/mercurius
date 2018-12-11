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
            $table->bigIncrements('id');
            $table->unsignedInteger('store_id')
                ->default(0)
                ->comment('活动ID');
            $table->string('name', 16)
                ->comment('活动名称');
            $table->timestamp('start_at')->comment('开始时间');
            $table->timestamp('end_at')->comment('结束时间');
            $table->enum('status')->comment('');
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
        Schema::dropIfExists('activities');
    }
}
