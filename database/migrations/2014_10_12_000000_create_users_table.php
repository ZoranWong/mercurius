<?php /** @noinspection ALL */

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 16)
                ->unique()
                ->comment('用户名');
            $table->string('mobile', 11)
                ->default('')
                ->comment('注册手机');
            $table->string('email')
                ->default('')
                ->comment('注册邮箱');
            $table->timestamp('email_verified_at')
                ->nullable()
                ->default(null)
                ->comment('邮箱认证时间');
            $table->string('nickname', 16)
                ->nullable()
                ->comment('昵称');
            $table->json('region')
                ->nullable()
                ->default(null)
                ->comment('区域');
            $table->enum('sex', ['UNKNOWN', 'MALE', 'FEMALE'])
                ->default('UNKNOWN')
                ->comment('性别');
            $table->enum('status', USER_STATUS_COLLECTION)
                ->default(USER_WAIT_ACTIVE)
                ->comment('账户状态');
            $table->string('password')->comment('密码');
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();
            $table->index('name');
            $table->index('status');
            $table->index('sex');
            $table->index('mobile');
            $table->index('email');
        });
        DB::statement("ALTER TABLE `users` COMMENT '平台用户表单'");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
