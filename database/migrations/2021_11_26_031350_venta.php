<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Venta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Venta', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Producto')->nullable();
            $table->integer('GrupoVenta')->nullable();

            $table->integer('Cantidad')->nullable();
            $table->decimal('HPrecio', 15, 2)->nullable();
            $table->dateTime('FechaVenta')->nullable();

            $table->nullableTimestamps();
            // $table->SoftDeletes();
            // $table->string('CreatorUserName', 250)->nullable();
            // $table->string('UpdaterUserName', 250)->nullable();
            // $table->string('DeleterUserName', 250)->nullable();

            $table->foreign('Producto')->references('id')->on('Producto');
            $table->foreign('GrupoVenta')->references('id')->on('GrupoVenta');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Venta');
    }
}
