<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLiquidacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidaciones', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->float('sueldo_neto');
            $table->date('periodo');
            $table->float('total_haber');
            $table->float('total_deduccion');
            $table->enum('tipo', ['MENSUAL','VACACIONES','ANUAL_COMPLEMENTARIO','EGRESO']);
            $table->float('totalHaberRemunerativo');
            $table->float('totalHaberNoRemunerativo');
            $table->boolean('estado');
            $table->integer('empleado_id')->unsigned();
            $table->foreign('empleado_id')->references('id')->on('empleados')->ondelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liquidaciones');
    }
}
