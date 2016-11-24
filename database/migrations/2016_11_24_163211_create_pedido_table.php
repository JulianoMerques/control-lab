<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedido', function (Blueprint $table) {
            $table->integer('id')->primary();
//            $table->primary('id');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuario');

            $table->integer('laboratorio_id')->unsigned();
            $table->foreign('laboratorio_id')->references('id')->on('laboratorios');

            $table->integer('maquina_id')->unsigned();
            $table->foreign('maquina_id')->references('id')->on('maquinas');

            $table->integer('problema_id')->unsigned();
            $table->foreign('problema_id')->references('id')->on('problema');

            $table->integer('tipo_manutencao_id')->unsigned();
            $table->foreign('tipo_manutencao_id')->references('id')->on('tipo_manutencao');

            $table->integer('situacao');
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
        Schema::dropIfExists('pedido');
    }
}
