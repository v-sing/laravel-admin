<?php

/**
 * Created by PhpStorm.
 * Author: 紫云沫雪こ
 * Email:email1946367301@163.com
 * Date: 2019/3/21 0021
 * Time: 16:47
 */

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;


class CreateAdminTables extends Migration
{
    /**
     * 创建后台基础表
     */
    public function up()
    {
        $connection = config('admin.database.connection') ?: config('database.default');
        Schema::connection($connection)->create(config('admin.database.admin_table'), function (Blueprint $table) {
            $table->increments('id')->primary()->comment('ID');
            $table->string('username', 20)->unique()->comment('用户名');
            $table->string('nickname', 20)->comment('用户名');
            $table->string('password', 60)->comment('密码');
            $table->string('salt', 30)->comment('密码盐');
            $table->string('avatar', 100)->nullable()->comment('头像');
            $table->string('email', 100)->nullable()->comment('邮箱');
            $table->string('token', 60)->comment('Session标识');
            $table->string('status', 10)->default('normal')->comment('状态');
            $table->integer('loginfailure', 1)->comment('失败次数');
            $table->integer('logintime', 10)->comment('登录时间');
            $table->integer('created_at', 10)->comment('注册时间');
            $table->integer('updated_at', 10)->comment('更新时间');
            $table->integer('deleted_at', 10)->comment('删除时间');
            $table->timestamps();
        });

        Schema::connection($connection)->create(config('admin.database.admin_table'), function (Blueprint $table) {
            $table->increments('id')->primary()->comment('ID');
            $table->string('username', 20)->unique()->comment('用户名');
            $table->string('nickname', 20)->comment('用户名');
            $table->string('password', 60)->comment('密码');
            $table->string('salt', 30)->comment('密码盐');
            $table->string('avatar', 100)->nullable()->comment('头像');
            $table->string('email', 100)->nullable()->comment('邮箱');
            $table->string('token', 60)->comment('Session标识');
            $table->string('status', 10)->default('normal')->comment('状态');
            $table->integer('loginfailure', 1)->comment('失败次数');
            $table->integer('logintime', 10)->comment('登录时间');
            $table->integer('created_at', 10)->comment('注册时间');
            $table->integer('updated_at', 10)->comment('更新时间');
            $table->integer('deleted_at', 10)->comment('删除时间');
            $table->timestamps();
        });
    }
}