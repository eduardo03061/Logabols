<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosPedidosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_pedidos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_pedido')->unsigned();

            $table->foreign('id_pedido')->references('id')->on('pedidos')->onDelete("cascade");

            $table->string('tipo');
            $table->string('medida');
            $table->bigInteger('cantidad');
            $table->string('nota');
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
        Schema::dropIfExists('registros_pedidos');
    }
}
