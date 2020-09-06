<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialempleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialempleados', function (Blueprint $table) {
            $table->bigIncrements('codh_empleado');

            $table->string('cod_empleado_fk', 2);
            $table->string('cod_secretaria_fk', 2);

            $table->string('operacion');
            $table->timestamp('fecha_operacion');
            $table->timestamps();

             $table->foreign('cod_empleado_fk')
                  ->references('cod_empleado')
                  ->on('empleados')
                  ->onDelete('cascade'); 

             $table->foreign('cod_secretaria_fk')
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
        Schema::dropIfExists('historialempleados');
    }
}
