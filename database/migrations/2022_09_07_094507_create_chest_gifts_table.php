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
        Schema::create('chest_gifts', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('type')->nullable();

            $table->integer('years')->nullable();
            $table->integer('months')->nullable();
            $table->integer('days')->nullable();

            $table->integer('percentage')->nullable();
            $table->string('percentage_on')->nullable();

            $table->foreignId('user_group_id')->nullable()->constrained('user_groups')->onDelete('CASCADE');

            $table->integer('active')->default(1);
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
        Schema::dropIfExists('chest_gifts');
    }
};
