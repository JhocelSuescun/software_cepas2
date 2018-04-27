<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMetodoAgarSemisolidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('metodo_conservacion_agar_semisolido', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_metodo')->unsigned();
            $table->foreign('id_metodo')->references('id')->on('metodos_conservacion');
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
        Schema::dropIfExists('metodo_conservacion_agar_semisolido');
    }
}
