<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosHasImagenesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos_has_imagenes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_producto');
            $table->unsignedBigInteger('id_imagen');

            $table->foreign('id_producto')->references('id')->on('productos')->onDelete('cascade');
            $table->foreign('id_imagen')->references('id')->on('imagenes')->onDelete('cascade');
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
        Schema::dropIfExists('productos_has_imagenes');
    }
}
