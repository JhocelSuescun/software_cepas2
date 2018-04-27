<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIdentificacionMolecularTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identificacion_molecular', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_cepa')->unsigned();
            $table->foreign('id_cepa')->references('id')->on('cepa');
            $table->date('fechaaccesion')->nullable();
            $table->integer('rep_solu_salina')->nullable();
            $table->string('obs_solu_salina',100)->nullable();
            $table->integer('rep_tub_agar')->nullable();
            $table->string('obs_tub_agar',100)->nullable();
            $table->integer('rep_suelo_esteril')->nullable();
            $table->string('obs_suelo_esteril',100)->nullable();
            $table->integer('rep_cult_agar')->nullable();
            $table->string('obs_cult_agar',100)->nullable();
            $table->integer('rep_glicerol')->nullable();
            $table->string('obs_glicerol',100)->nullable();
            $table->integer('rep_papel_filtro')->nullable();
            $table->string('obs_papel_filtro',100)->nullable();
            $table->float('porcentaje_similitud')->nullable();
            $table->string('informe_secuenciacion',100)->nullable();
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
        Schema::dropIfExists('identificacion_molecular');
    }
}
