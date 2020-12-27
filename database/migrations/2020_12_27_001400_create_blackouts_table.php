<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlackoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blackouts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('zona_id');
            $table->date('FechaInicio');
            $table->time('HoraInicio', 0);
            $table->date('FechaFinal');
            $table->time('HoraFinal', 0);
            $table->longText('description')->nullable();
            $table->foreign('zona_id')->references('id')->on('zonas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blackouts');
    }
}
