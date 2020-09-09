<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpleadosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empleados', function (Blueprint $table) {
            $table->string('cod_empleado',2)->primary();
            $table->unsignedbigInteger('cod_rol_fk');
            $table->string('nombre', 30);
            $table->string('apellido', 40);
            $table->string('dui', 9)->unique();
            $table->string('edad', 3);
            $table->char('sexo');
            $table->timestamps();

            $table->foreign('cod_rol_fk')
                  ->references('cod_rol')
                  ->on('rols')
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
        Schema::dropIfExists('empleados');
    }
}
