<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComprasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->bigIncrements('cod_compra');

            $table->unsignedbigInteger('cod_proveedor_fk');
            $table->string('cod_empleado_fk', 2);

            $table->text('descripcion');
            $table->string('estado');
            $table->timestamps();

            $table->foreign('cod_proveedor_fk')
                  ->references('cod_proveedor')
                  ->on('proveedors')
                  ->onDelete('cascade');

            $table->foreign('cod_empleado_fk')
                  ->references('cod_empleado')
                  ->on('empleados')
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
        Schema::dropIfExists('compras');
    }
}
