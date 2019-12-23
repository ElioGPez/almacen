<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Venta;
use App\Compra;
use App\Cuenta;
use App\Linea_Venta;
use App\Producto;
use Carbon\Carbon;
use DB;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cuenta = Venta::with(['linea_venta.producto'
        ]);

        $ventas=DB::table('ventas as c');
        return $cuenta->get();    
    }

    public function estadistica()
    {
        $ventas = DB::select('select  extract(day from a.created_at) as Dia ,sum(monto) as total, count(monto) as cantidad 
         from ventas as a
         group by extract(year from a.created_at), extract(month from a.created_at), extract(day from a.created_at) 
         order by Dia desc  LIMIT 5');
         
         return $ventas; 
    }
    public function producto()
    {
        $ventas = DB::select('select  p.nombre as Producto , sum(lv.cantidad) as Cantidad
        from ventas as v
        inner join linea_ventas as lv on lv.venta_id = v.id 
        inner join productos as p on lv.producto_id = p.id
        group by p.nombre LIMIT 5');
         
         return $ventas; 
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
        $venta = new Venta;
        $venta->monto = $request->total;
        //Establecemos la fecha actual
       /* $mytime= Carbon::now('America/Argentina/Tucuman');
        $venta->fecha = $mytime->toDateTimeString();*/
        $venta->empleado_id = $request->empleado_id;
       
        $venta->save();
        //dd($request->linea_venta);
        $linea_venta = $request->linea_venta;
        foreach ($linea_venta as $linea) {
        //dd($linea);

          $linea_v = new Linea_Venta();
          $linea_v->venta_id=$venta->id;
          $linea_v->producto_id=$linea["id"];
         // dd($linea["cantidad"]);
          $linea_v->cantidad=$linea["cantidad"];
          $linea_v->subtotal=$linea["subtotal"];
          //$linea_v->precio=$linea["precio"];
          $linea_v->save();

          //if($linea["categoria_id"] == '2'){
            $producto = Producto::findOrFail($linea["producto"]["id"]);
            $producto->stock -= $linea["cantidad"];
            $producto->save();
          //}
        }

        //Va a cuenta?
        if($request->cliente_id != ''){
            $cuenta = Cuenta::where('cliente_id','=',$request->cliente_id)->get();
            $cuenta[0]->saldo =  $cuenta[0]->saldo + $request->total;
            $cuenta[0]->save();
        }

        return $venta;
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
