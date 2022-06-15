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
        Schema::create('work_samples', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('body');
            $table->string('slug');
            $table->string('time_end');
            $table->string('customer');
            $table->string('link');
            $table->string('poster');
            $table->string('screen_shot')->nullable();
            $table->integer('order_number');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('skill_work', function (Blueprint $table) {
            $table->unsignedBigInteger('skill_id');
            $table->foreign('skill_id')->references('id')->on('skills')->onDelete('cascade');
            $table->unsignedBigInteger('work_id');
            $table->foreign('work_id')->references('id')->on('work_samples')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('work_samples');
    }
};
