<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Compra;
use Carbon\Carbon;
use App\Linea_Compra;
use App\Producto;
use App\Precio_Venta;
use DB;

class CompraController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $compras=DB::table('compras as c');
        return $compras->get();    
    }  

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $compra = new Compra;
        $compra->monto = $request->total;
        //Establecemos la fecha actual
        $mytime= Carbon::now('America/Argentina/Tucuman');
        $compra->fecha = $mytime->toDateTimeString();
        //$compra->estado = 'PAGADA'; 
        //return  $request->proveedor
        $compra->proveedor_id =  $request->proveedor_id;
        $compra->empleado_id = $request->empleado_id;
        $compra->save();

        $linea_compra = $request->linea_compra;
        foreach ($linea_compra as $linea) {

          $linea_c = new Linea_Compra();
          $linea_c->compra_id=$compra->id;
          $linea_c->producto_id=$linea["id"];
          $linea_c->cantidad=$linea["cantidad"];
          $linea_c->subtotal=$linea["subtotal"];
          $linea_c->save();

            $producto = Producto::findOrFail($linea["producto"]["id"]);
            //Comprobamos si asignaron un nuevo Precio de Venta
            if($linea["precio_venta"] != ''){
                $producto->precio_venta = $linea["precio_venta"];

                $precio_venta = new Precio_Venta;
                $precio_venta->precio = $linea["precio_venta"];
                $precio_venta->producto_id = $producto->id;
                $precio_venta->fecha = $mytime->toDateTimeString();
                $precio_venta->save();
            }
            //Comprobamos si asignaron una nueva Fecha de Vencimiento
            if($linea["vencimiento"]  != ''){
                $producto->fecha_vencimiento = $linea["vencimiento"];
            }

            $producto->stock += $linea["cantidad"];
            $producto->save();
        }

        return $compra;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
