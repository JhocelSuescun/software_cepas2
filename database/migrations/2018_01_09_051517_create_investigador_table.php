<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInvestigadorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investigador', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nombres', 20);
            $table->string('apellidos', 20);
            $table->string('codigo', 7)->unique();
            $table->string('email', 60);
            $table->string('url_cvlac', 60);
            $table->string('imagen', 60)->nullable()->default('default.jpg');;


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
        Schema::dropIfExists('investigador');
    }
}
