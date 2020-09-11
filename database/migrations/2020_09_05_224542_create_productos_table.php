<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->string('cod_producto', 6)->primary();
            $table->unsignedbigInteger('cod_proveedor_fk');

            $table->string('nombre', 100);
            $table->bigInteger('cantidad');
            $table->decimal('precio',6,2);
            $table->text('descripcion');
            $table->text('presentacion');

            $table->foreign('cod_proveedor_fk')
                  ->references('cod_proveedor')
                  ->on('proveedors')
                  ->onDelete('cascade');

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
