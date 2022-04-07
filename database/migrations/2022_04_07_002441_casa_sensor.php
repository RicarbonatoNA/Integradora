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
        Schema::create('casa_sensor', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('casa_id');
            $table->foreign('casa_id')->references('id')->on('casa');
            $table->unsignedBigInteger('temperatura_id');
            $table->foreign('temperatura_id')->references('id')->on('temperatura');
            $table->unsignedBigInteger('humedad_id');
            $table->foreign('humedad_id')->references('id')->on('humedad');
            $table->unsignedBigInteger('ultrasonico_id');
            $table->foreign('ultrasonico_id')->references('id')->on('ultrasonico');
            $table->unsignedBigInteger('movimiento_id');
            $table->foreign('movimiento_id')->references('id')->on('movimiento');
            $table->unsignedBigInteger('humo_id');
            $table->foreign('humo_id')->references('id')->on('humo');
            $table->unsignedBigInteger('gas_id');
            $table->foreign('gas_id')->references('id')->on('gas');
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
        //
    }
};
