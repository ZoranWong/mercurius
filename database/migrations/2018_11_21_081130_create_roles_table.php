<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug', 16)
                ->default('')
                ->comment('角色标示符');

            $table->string( 'name', 16)
                ->default('')
                ->comment('角色名称');

            $table->timestamps();
            $table->softDeletes();
            $table->index('slug');
        });
        DB::statement('ALTER TABLE `roles` COMMENT "角色表单"');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('roles');
    }
}
