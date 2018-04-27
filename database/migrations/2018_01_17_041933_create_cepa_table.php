<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCepaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cepa', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo',10);
            $table->unique('codigo');
            $table->string('estado',20);
            $table->integer('id_grupomicrobiano')->unsigned();
            $table->foreign('id_grupomicrobiano')->references('id')->on('grupo_microbiano');
            $table->integer('id_genero')->unsigned();
            $table->foreign('id_genero')->references('id')->on('genero');
            $table->integer('id_especie')->unsigned()->nullable();
            $table->foreign('id_especie')->references('id')->on('especie');
            $table->integer('id_origen')->unsigned();
            $table->foreign('id_origen')->references('id')->on('origen');
            $table->string('morfologia',30);
            $table->string('tincion_gram',30);
            $table->string('motilidad',30);
            $table->boolean('publicado');
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
        Schema::dropIfExists('cepa');
    }
}
