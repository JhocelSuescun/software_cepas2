<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaracteristicasBioquimicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caracteristicas_bioquimicas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cepa')->unsigned();
            $table->foreign('id_cepa')->references('id')->on('cepa');
            $table->string('oxidasa',100)->nullable();
            $table->string('catalasa',100)->nullable();
            $table->string('atrato',100)->nullable();
            $table->string('tsi',100)->nullable();
            $table->string('lia',100)->nullable();
            $table->string('sim',100)->nullable();
            $table->string('rm',100)->nullable();
            $table->string('vp',100)->nullable();
            $table->string('nitrato',100)->nullable();
            $table->string('caldo_urea',100)->nullable();
            $table->string('of',100)->nullable();
            $table->string('glucosa',100)->nullable();
            $table->string('lactosa',100)->nullable();
            $table->string('manitol',100)->nullable();
            $table->string('xilosa',100)->nullable();
            $table->string('arabinosa',100)->nullable();
            $table->string('sacarosa',100)->nullable();
            $table->string('otros_azucares',100)->nullable();
            $table->string('almidon',100)->nullable();
            $table->string('lecitinasa',100)->nullable();
            $table->string('lipasa',100)->nullable();
            $table->string('otras_enzimas',100)->nullable();
            $table->string('hidrolisis_caseina',100)->nullable();
            $table->string('hidrolisis_gelatina',100)->nullable();
            $table->string('hidrolisis_urea',100)->nullable();
            $table->string('crecimiento_nacl',100)->nullable();
            $table->string('crecimiento_diferentes_temperaturas',100)->nullable();
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
        Schema::dropIfExists('caracteristicas_bioquimicas');
    }
}
