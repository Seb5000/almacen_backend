<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GrupoVenta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GrupoVenta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Usuario')->nullable();
            $table->integer('Cliente')->nullable();
            $table->dateTime('FechaVenta')->nullable();
            $table->decimal('Monto', 15, 2)->nullable();

            $table->nullableTimestamps();
            $table->foreign('Usuario')->references('id')->on('Usuario');
            $table->foreign('Cliente')->references('id')->on('Usuario');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GrupoVenta');
    }
}
