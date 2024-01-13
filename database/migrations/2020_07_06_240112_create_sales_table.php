<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('payment_method');
            $table->decimal('quantity', 8, 2);
            $table->bigInteger('id_user')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete("cascade");
            $table->bigInteger('company_id')->unsigned();
            $table->foreign('company_id')->references('company_id')->on('users')->onDelete("cascade");
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
        Schema::dropIfExists('sales');
    }
}
