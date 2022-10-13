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
        Schema::create('user_chest_gifts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('CASCADE');
            $table->foreignId('chest_id')->constrained('chests')->onDelete('CASCADE');
            $table->foreignId('gift_id')->constrained('chest_gifts')->onDelete('CASCADE');
            $table->integer('seen')->default(0);
            $table->timestamp('expire_at')->nullable();
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
        Schema::dropIfExists('user_chest_gifts');
    }
};
