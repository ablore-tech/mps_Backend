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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('phone_model_id')->references('id')->on('phone_models')->onDelete('cascade');
            $table->text('name')->nullable();
            $table->text('device_uid')->nullable();
            $table->text('max_price')->nullable();
            $table->text('photo')->nullable();
            $table->longText('variations')->nullable();
            $table->longText('color_variants')->nullable();
            $table->text('special_offers')->nullable();
            $table->text('device_specification')->nullable();
            $table->text('variable_data')->nullable();
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
        Schema::dropIfExists('devices');
    }
};