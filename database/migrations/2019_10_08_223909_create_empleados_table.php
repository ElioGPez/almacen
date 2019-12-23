<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('turno');
            $table->string('nombre');
            $table->string('dni');
            $table->string('apellido');
            $table->string('cuil');
            $table->enum('sexo', ['masculino', 'femenino']);
            $table->string('cargo');
            $table->string('telefono')->nullable();
            $table->date('fecha_nacimiento');
            $table->float('sueldo');
            $table->date('fecha_ingreso');
            $table->boolean('estado');
            $table->integer('domicilio_id')->unsigned();
            $table->foreign('domicilio_id')->references('id')->on('domicilios')->ondelete('cascade');
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
