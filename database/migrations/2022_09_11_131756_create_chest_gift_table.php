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
        Schema::create('chest_gift', function (Blueprint $table) {
            $table->foreignId('chest_id')->constrained('chests')->onDelete('CASCADE');
            $table->foreignId('chest_gift_id')->constrained('chest_gifts')->onDelete('CASCADE');
            $table->integer('percentage')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chest_gift');
    }
};
