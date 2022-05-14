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
        Schema::create('pojazdy', function (Blueprint $table) {
            $table->id();
            $table->string('marka');
            $table->string('model');
            $table->decimal('dopuszczalna_masa');
            $table->boolean('P_dostepnosc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pojazdy');
    }
};
