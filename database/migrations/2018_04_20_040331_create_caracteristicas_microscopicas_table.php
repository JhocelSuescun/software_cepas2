<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicasMicroscopicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_microscopicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cepa')->unsigned();
            $table->foreign('id_cepa')->references('id')->on('cepa');
            $table->string('forma',100)->nullable();
            $table->string('ordenamiento',100)->nullable();
            $table->string('tincion_gram',100)->nullable();
            $table->string('estado_tincion_esporas',100)->nullable();
            $table->string('ubicacion_esporas',100)->nullable();
            $table->string('tincion_capsula',100)->nullable();
            $table->string('otras_caracteristicas',100)->nullable();
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
        Schema::dropIfExists('caracteristicas_microscopicas');
    }
}
