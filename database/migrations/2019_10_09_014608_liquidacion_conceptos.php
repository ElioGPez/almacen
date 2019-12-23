<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LiquidacionConceptos extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('liquidacion_conceptos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();  
            $table->integer('liquidacion_id')->unsigned();
            $table->foreign('liquidacion_id')->references('id')->on('liquidaciones')->ondelete('cascade');
            $table->integer('concepto_id')->unsigned();
            $table->foreign('concepto_id')->references('id')->on('conceptos')->ondelete('cascade');
            $table->float('monto');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('liquidacion_conceptos');
    }
}
