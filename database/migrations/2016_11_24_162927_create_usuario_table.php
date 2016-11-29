<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuario', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('turno_id')->unsigned()->default(1);
            $table->foreign('turno_id')->references('id')->on('turno');
            $table->integer('tipo_usuario_id')->unsigned()->default(3);
            $table->foreign('tipo_usuario_id')->references('id')->on('tipo_user');
            $table->string('nome');
            $table->string('sobrenome')->nullable();
            $table->string('telefone')->nullable();
            $table->string('funcao')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('img')->nullable();
            $table->rememberToken();
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
        Schema::drop('usuario');
    }
}
