<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLineaVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linea_ventas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->float('subtotal');   
            $table->float('cantidad');   
            $table->integer('venta_id')->unsigned();
            $table->foreign('venta_id')->references('id')->on('ventas')->ondelete('cascade');
            $table->integer('producto_id')->unsigned();
            $table->foreign('producto_id')->references('id')->on('productos')->ondelete('cascade');
        
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('linea_ventas');
    }
}
