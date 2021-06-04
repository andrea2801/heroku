<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidenciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion');
            $table->boolean('estado')->default(0);
            $table->unsignedBigInteger('id_usuario');
            $table->unsignedBigInteger('id_tf');
            $table->timestamps();
            $table->foreign('id_usuario')->references('id')->on('usuarios');
            $table->foreign('id_tf')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
    }
}
