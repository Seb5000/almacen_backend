<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GrupoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('GrupoCompra', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('Usuario')->nullable();

            $table->dateTime('FechaCompra')->nullable();
            $table->decimal('Monto', 15, 2)->nullable();

            $table->nullableTimestamps();
            $table->foreign('Usuario')->references('id')->on('Usuario');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('GrupoCompra');
    }
}
