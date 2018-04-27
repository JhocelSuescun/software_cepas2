<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracterizacionFisiologicaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracterizacion_fisiologica', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cepa')->unsigned();
            $table->foreign('id_cepa')->references('id')->on('cepa');
            $table->date('fecha')->nullable();
            $table->double('acido_indolacetico')->nullable();
            $table->double('solubilizacion_fosfatos')->nullable();
            $table->double('produccion_sideroforos')->nullable();
            $table->double('fijacion_nitrogeno')->nullable();
            $table->double('acido_salicilico')->nullable();
            $table->string('actividad_enzimatica',50)->nullable();
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
        Schema::dropIfExists('caracterizacion_fisiologica');
    }
}
