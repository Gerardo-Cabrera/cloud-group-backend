<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTrabajadoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trabajadores', function (Blueprint $table) {
            $table->id('trabajador_id');
            $table->string('nombre', 50);
            $table->string('apellidos', 50);
            $table->string('dni', 9)->unique();
            $table->date('fecha_nacimiento');
            $table->text('direccion');
            $table->binary('foto');
            $table->unsignedBigInteger('usuario_id')->nullable();
            $table->foreign('usuario_id')->references('usuario_id')->on('usuarios')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trabajadores');
    }
}
