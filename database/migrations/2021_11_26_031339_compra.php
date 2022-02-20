<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Compra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Compra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Producto')->nullable();
            $table->integer('GrupoCompra')->nullable();
            
            $table->integer('Cantidad')->nullable();
            $table->decimal('HPrecio', 15, 2)->nullable();
            $table->dateTime('FechaCompra')->nullable();

            $table->nullableTimestamps();
            $table->foreign('Producto')->references('id')->on('Producto');
            $table->foreign('GrupoCompra')->references('id')->on('GrupoCompra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Compra');
    }
}
