<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistorialclientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historialclientes', function (Blueprint $table) {
            $table->bigIncrements('codh_cliente');

            $table->string('cod_empleado_fk', 2);
            $table->string('cod_cliente_fk', 4);

            $table->string('operacion');
            $table->timestamp('fecha_operacion');


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
        Schema::dropIfExists('historialclientes');
    }
}
