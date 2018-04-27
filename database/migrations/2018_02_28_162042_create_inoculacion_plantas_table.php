<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInoculacionPlantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inoculacion_plantas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_proyecto')->unsigned();
            $table->foreign('id_proyecto')->references('id')->on('proyectos');
            $table->date('fecha');
            $table->string('variables',100)->nullable();
            $table->string('cultivo',100)->nullable();
            $table->double('rendimiento')->nullable();
            $table->double('peso_fresco_foliar')->nullable();
            $table->double('peso_seco_foliar')->nullable();
            $table->double('peso_fresco_radical')->nullable();
            $table->double('peso_seco_radical')->nullable();
            $table->double('altura_planta')->nullable();
            $table->double('longitud_planta')->nullable();
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
        Schema::dropIfExists('inoculacion_plantas');
    }
}
