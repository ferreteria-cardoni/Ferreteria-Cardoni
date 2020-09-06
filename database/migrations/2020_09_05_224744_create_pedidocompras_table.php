<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePedidocomprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pedidocompras', function (Blueprint $table) {
            $table->bigIncrements('cod_pedidocompra');

            $table->unsignedbigInteger('cod_compra_fk');
            $table->string('cod_producto_fk');

            $table->integer('cantidad');
            $table->timestamp('fecha_compra');
            $table->timestamps();


             $table->foreign('cod_compra_fk')
                  ->references('cod_compra')
                  ->on('compras')
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
        Schema::dropIfExists('pedidocompras');
    }
}
