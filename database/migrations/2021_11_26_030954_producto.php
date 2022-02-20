<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Producto extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Producto', function (Blueprint $table) {
            $table->increments('id');
            $table->string('Codigo', 250)->nullable();
            $table->string('Nombre', 500)->nullable();
            $table->text('Descripcion')->nullable();
            $table->decimal('PrecioCompra', 15, 2)->nullable();
            $table->decimal('PrecioVenta', 15, 2)->nullable();
            $table->string('Foto', 250)->nullable();



            $table->nullableTimestamps();
            // $table->SoftDeletes();
            // $table->string('CreatorUserName', 250)->nullable();
            // $table->string('UpdaterUserName', 250)->nullable();
            // $table->string('DeleterUserName', 250)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Producto');
    }
}
