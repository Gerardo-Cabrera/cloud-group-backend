<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePuestosLaboralesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puestos_laborales', function (Blueprint $table) {
            $table->id('puestolaboral_id');
            $table->string('nombre', 50);
            $table->tinyInteger('importancia');
            $table->boolean('es_jefe');
            $table->unsignedBigInteger('categoria_id');
            $table->foreign('categoria_id')->references('categoria_id')->on('categorias')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puestos_laborales');
    }
}
