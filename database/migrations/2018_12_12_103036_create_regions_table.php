<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRegionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regions', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code', 6)->comment('行政编码');
            $table->unsignedInteger('parent_id')->default(0)->comment('上级行政ID');
            $table->string('name', 16)->comment('行政区域名称');
            $table->string('first_word', 1)->comment('首字母');
            $table->string('english_name')->comment('英文名称');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `regions` comment '区域表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regions');
    }
}
