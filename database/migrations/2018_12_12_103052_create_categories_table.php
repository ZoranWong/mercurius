<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('icon', 1024)->default('')->comment('分类图标');
            $table->string('name', 16)->comment('名称');
            $table->unsignedInteger('parent_id')->default(0)->comment('父级分类');
            $table->timestamps();
            $table->softDeletes();
        });
        DB::statement("ALTER TABLE `categories` comment '分类表'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
