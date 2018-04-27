<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodosConservacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodos_conservacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cepa')->unsigned();
            $table->foreign('id_cepa')->references('id')->on('cepa');
            $table->integer('id_tipo')->unsigned();
            $table->foreign('id_tipo')->references('id')->on('tipo_metodos');
            $table->date('start');
            $table->string('title',50);
            $table->integer('numero_replicas');
            $table->string('recuento',50);
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
        Schema::dropIfExists('metodos_conservacion');
    }
}
