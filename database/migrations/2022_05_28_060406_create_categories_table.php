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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('title');
            $table->string('slug');
            $table->boolean('is_active')->default(1);
            $table->integer('order_number');
            $table->string('poster')->nullable();
            $table->enum('type' , ['article' , 'work'])->default('article');
            $table->softDeletes();
            $table->timestamps();
        });
        Schema::create('categoriable', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->morphs('categoriable');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categoryable');
        Schema::dropIfExists('categories');
    }
};
