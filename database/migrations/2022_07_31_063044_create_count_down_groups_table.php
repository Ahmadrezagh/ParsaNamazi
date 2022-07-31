<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('count_down_groups', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('count_down_id');
            $table->unsignedBigInteger('user_group_id');
            $table->timestamp('show_at')->nullable();
            $table->timestamps();

            $table->foreign('count_down_id')->references('id')->on('count_downs')->onDelete('CASCADE');
            $table->foreign('user_group_id')->references('id')->on('user_groups')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('count_down_groups');
    }
};
