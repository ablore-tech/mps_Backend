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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();            
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreignId('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->foreignId('variant_id')->references('id')->on('variants')->onDelete('cascade');
            $table->foreignId('phone_model_id')->references('id')->on('phone_models')->onDelete('cascade');
            $table->decimal('price')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
