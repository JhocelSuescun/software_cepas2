<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCepaXMedioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cepaxmedio', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cepa')->unsigned();
            $table->foreign('id_cepa')->references('id')->on('cepa');
            $table->integer('id_medio')->unsigned();
            $table->foreign('id_medio')->references('id')->on('medio');
           $table->integer('id_forma')->unsigned();
            $table->foreign('id_forma')->references('id')->on('forma');
             $table->integer('id_consistencia')->unsigned();
            $table->foreign('id_consistencia')->references('id')->on('consistencia');
            $table->integer('id_elevacion')->unsigned();
            $table->foreign('id_elevacion')->references('id')->on('elevacion');
            $table->integer('id_borde')->unsigned();
            $table->foreign('id_borde')->references('id')->on('borde');
            $table->integer('id_detalleoptico')->unsigned();
            $table->foreign('id_detalleoptico')->references('id')->on('detalleoptico');
            $table->integer('id_superficie')->unsigned();
            $table->foreign('id_superficie')->references('id')->on('superficie');
            $table->string('color',100);
            $table->string('otrasCaracteristicas',100);
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
        Schema::dropIfExists('cepaxmedio');
    }
}
