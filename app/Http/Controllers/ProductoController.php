<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Precio_Venta;
use DB;
use Carbon\Carbon;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=DB::table('productos as c')->get();
        $categorias=DB::table('categorias as c')->get();

        $resultados[] = [
            'productos' => $productos,
            'categorias' => $categorias
        ];
        //$productos=Producto::with(['categoria']);
        return $resultados;  
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
        $producto = new Producto;
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->codigo = $request->codigo;
        $producto->tipo = $request->tipo;
        $producto->precio_venta = $request->precio_venta;
        $producto->stock = $request->stock;
        $producto->fecha_vencimiento = $request->fecha_vencimiento;
        $producto->stock_minimo = $request->stock_minimo;
        $producto->categoria_id = $request->categoria_id;
        $producto->save();

        $precio_venta = new Precio_Venta;
        $precio_venta->precio = $producto->precio_venta;
        $precio_venta->producto_id=$producto->id;
        $mytime= Carbon::now('America/Argentina/Tucuman');
        $precio_venta->fecha = $mytime->toDateTimeString();
        $precio_venta->save();

        return 'Producto REGISTRADO!!';
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
        //return $request;
        $producto = Producto::findOrFail($id);

        $producto->categoria_id = $request->get('categoria_id');
        $producto->nombre = $request->get('nombre');
        $producto->codigo = $request->get('codigo');
        $producto->fecha_vencimiento = $request->get('fecha_vencimiento');
        $producto->stock_minimo = $request->get('stock_minimo');
        $producto->descripcion = $request->get('descripcion');
        $producto->precio_venta = $request->get('precio_venta');

        $producto->update();

        return $producto;    }

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
