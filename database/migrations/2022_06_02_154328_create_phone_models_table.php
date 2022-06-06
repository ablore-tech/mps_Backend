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
        Schema::create('phone_models', function (Blueprint $table) {
            $table->id();
            $table->foreignId('brand_id')->references('id')->on('brands')->onDelete('cascade');
            $table->foreignId('series_id')->nullable()->references('id')->on('series')->onDelete('cascade');
            $table->text('name')->nullable();
            $table->text('image')->nullable();
            $table->text('description')->nullable();
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
        Schema::dropIfExists('models');
    }
};
