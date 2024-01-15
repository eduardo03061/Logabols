<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRegistrosSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('registros_sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_sales')->unsigned();

            $table->string('name');
            $table->bigInteger('bulks');
            $table->bigInteger('unidades');

            $table->decimal('kg', 8, 2);

            $table->bigInteger('id_item')->unsigned();
            $table->foreign('id_item')->references('id')->on('inventory')->onDelete("cascade");

            $table->decimal('price', 8, 2);
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
        Schema::dropIfExists('registros_sales');
    }
}
