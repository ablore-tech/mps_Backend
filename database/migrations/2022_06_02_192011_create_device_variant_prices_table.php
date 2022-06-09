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
        Schema::create('device_variant_prices', function (Blueprint $table) {
            $table->id();
            $table->foreignId('device_id')->references('id')->on('devices')->onDelete('cascade');
            $table->foreignId('variant_id')->references('id')->on('variants')->onDelete('cascade');
            $table->text('device_uid')->nullable();
            $table->text('imei_number')->nullable();
            $table->integer('price');
            $table->longText('color')->nullable();
            $table->text('photo')->nullable();
            $table->text('specification')->nullable();
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
        Schema::dropIfExists('device_variant_prices');
    }
};
