<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->unique();
            $table->string('nombre');
            $table->unsignedBigInteger('id_categoria');
            $table->double('costo');
            $table->double('precio_und');
            $table->double('precio_mayor')->nullable();
            $table->text('descripcion')->nullable();
            $table->enum('status',['Activo','Inactivo'])->default('Activo');
            $table->integer('existencia');
            $table->integer('disponible');
            $table->integer('con_detalles')->nullable();
            $table->integer('vendidos')->nullable();

            $table->foreign('id_categoria')->references('id')->on('categorias')->onDelete('cascade');
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
        Schema::dropIfExists('productos');
    }
}
