<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMarcaProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('marca_productos', function (Blueprint $table) {
             $table->string('cod_producto_fk');
            $table->unsignedbigInteger('cod_marca_fk');
            
            $table->timestamps();

            $table->foreign('cod_producto_fk')
                  ->references('cod_producto')
                  ->on('productos')
                  ->onDelete('cascade');

            $table->foreign('cod_marca_fk')
                  ->references('cod_marca')
                  ->on('marcas')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('marca_productos');
    }
}
