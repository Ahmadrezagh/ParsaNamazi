<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('telegram_user_id')->unique()->nullable();
            $table->string('profile')->nullable();
            $table->integer('type_id')->default(3);
            $table->string('email')->unique()->nullable();
            $table->string('password')->nullable();
            $table->double('credit')->default(0);
            $table->double('store_credit')->default(0);
            $table->double('cash')->default(0);
            $table->string('referral_code')->nullable();
            $table->string('referral_to')->nullable();
            $table->string('ip')->nullable();
            $table->rememberToken();
            $table->softDeletes();
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
        Schema::table('users', function (Blueprint $table) {
            $table->dropSoftDeletes();
        });
    }
}
