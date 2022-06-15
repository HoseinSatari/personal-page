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
        Schema::create('options', function (Blueprint $table) {
            $table->id();
            $table->string('sitename');
            $table->text('description');
            $table->text('keyword');
            $table->string('logo');
            $table->string('phone_support');
            $table->string('phone_admin');
            $table->string('instagram');
            $table->string('whatsup');
            $table->string('linkdin');
            $table->string('github');
            $table->string('gitlab');
            $table->string('stackoverflow');
            $table->string('twitter');
            $table->string('telegram');
            $table->boolean('is_active');
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
        Schema::dropIfExists('options');
    }
};
