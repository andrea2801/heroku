<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNotificacionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('notificaciones', function (Blueprint $table) {
            $table->id();
            $table->string('asunto');
            $table->string('detalle');
            $table->unsignedBigInteger('creador');
            $table->unsignedBigInteger('destinatario');
            $table->boolean('estado')->default(0);
            $table->boolean('prioridad')->default(0);
            $table->date('fecha');
            $table->timestamps();
            $table->foreign('destinatario')->references('id')->on('users');
            $table->foreign('creador')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('notificaciones');
    }
}
