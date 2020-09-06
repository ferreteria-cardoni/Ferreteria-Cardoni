<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('cod_venta');
            $table->text('direccion');
            $table->string('estado');

            $table->string('cod_empleado_fk', 2);
            $table->string('cod_cliente_fk', 4);

            $table->foreign('cod_empleado_fk')
                  ->references('cod_empleado')
                  ->on('empleados')
                  ->onDelete('cascade');

            $table->foreign('cod_cliente_fk')
                  ->references('cod_cliente')
                  ->on('clientes')
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
        Schema::dropIfExists('ventas');
    }
}
