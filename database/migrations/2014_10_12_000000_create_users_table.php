<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('apellidos');
            $table->integer('telefono');
            $table->string('dni', 9)->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('img')->nullable();
            $table->unsignedBigInteger('zona')->nullable();
            $table->unsignedBigInteger('rol_id');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->foreign('rol_id')->references('id')->on('roles');
            $table->foreign('zona')->references('id')->on('zonas');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
