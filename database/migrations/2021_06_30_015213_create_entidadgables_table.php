<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntidadgablesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entidadgables', function (Blueprint $table) {
            $table->id('entidadgable_id');
            $table->string('entidadgable_type');
            $table->unsignedBigInteger('entidad_id');
            $table->foreign('entidad_id')->references('entidad_id')->on('entidades')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entidadgables');
    }
}
