<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialproductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialproductos', function (Blueprint $table) {
            $table->bigIncrements('codh_producto');
            $table->string('operacion');
            $table->timestamp('fecha_operacion');


            $table->string('cod_producto_fk');
            $table->string('cod_empleado_fk', 2);

            $table->foreign('cod_producto_fk')
                  ->references('cod_producto')
                  ->on('productos')
                  ->onDelete('cascade');

            $table->foreign('cod_empleado_fk')
                  ->references('cod_empleado')
                  ->on('empleados')
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
        Schema::dropIfExists('historialproductos');
    }
}
