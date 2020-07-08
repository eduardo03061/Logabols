<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosNominaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_nomina', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_nomina')->unsigned();

            $table->foreign('id_nomina')->references('id')->on('nomina')->onDelete("cascade");

            $table->string('name'); 
            $table->bigInteger('basura');
            $table->bigInteger('camiseta');  
            $table->bigInteger('jumbo');
            $table->bigInteger('reempacado');
            $table->bigInteger('empacado');
            $table->float('total');
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
        Schema::dropIfExists('registros_nomina');
    }
}
