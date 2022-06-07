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
        Schema::create('final_orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_naczepy')
                ->references('id')
                ->on('trailers');
            $table->foreignId('id_pojazdu')
                ->references('id')
                ->on('cars');
            $table->foreignId('id_zamowienia')
                ->references('id')
                ->on('orders');
            $table->integer('waga');
            $table->integer('ilosc_ladunku');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('final_orders');
    }
};
