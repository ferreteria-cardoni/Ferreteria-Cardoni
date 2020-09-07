<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialproveedorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialproveedors', function (Blueprint $table) {
            $table->bigIncrements('codh_proveedor');

            $table->string('cod_empleado_fk', 2);
            $table->unsignedbigInteger('cod_proveedor_fk');

            $table->string('operacion');
            $table->timestamp('fecha_operacion');

             $table->foreign('cod_empleado_fk')
                  ->references('cod_empleado')
                  ->on('empleados')
                  ->onDelete('cascade');

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
        Schema::dropIfExists('historialproveedors');
    }
}
