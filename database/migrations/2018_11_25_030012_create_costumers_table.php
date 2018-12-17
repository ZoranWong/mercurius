<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCostumersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('costumers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nickname', 16)->default('')->comment('昵称');
            $table->string('mobile', 11)->default('')->comment('用户手机');
            $table->string('email', 256)->default('')->comment('用户邮箱');
            $table->string('user_name', 16)->unique()->comment('用户名');
            $table->string('real_name')->default('')->comment('用户姓名');
            $table->enum('sex', SEX_COLLECTION)
                ->default(UNKNOWN)
                ->comment('性别');
            $table->json('birthday')->default([
                'year' => null,
                'month' => null,
                'day' => null
            ])->comment('生日');
            $table->string('country_id', 6)->default('')->comment('国家');
            $table->string('province_id', 6)->default('')->comment('省份');
            $table->string('city_id', 6)->default('')->comment('城市');
            $table->string('county_id', 6)->default('')->comment('区县');
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
        Schema::dropIfExists('costumers');
    }
}
