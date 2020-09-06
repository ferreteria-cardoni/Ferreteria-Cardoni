<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidoventasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidoventas', function (Blueprint $table) {
              $table->bigIncrements('cod_pedidoventa');

            $table->unsignedbigInteger('cod_venta_fk');
            $table->string('cod_producto_fk');

            $table->integer('cantidad');
            $table->timestamp('fecha_venta');
            $table->decimal('total',6,2);
            $table->timestamps();


             $table->foreign('cod_venta_fk')
                  ->references('cod_venta')
                  ->on('ventas')
                  ->onDelete('cascade');

              $table->foreign('cod_producto_fk')
                  ->references('cod_producto')
                  ->on('productos')
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
        Schema::dropIfExists('pedidoventas');
    }
}
