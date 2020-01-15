<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Proveedor;
use DB;

class ProveedorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $proveedores=DB::table('proveedores as c');
        return $proveedores->get();
    }
    public function filtro($proveedor)
    {
        if($proveedor != '_'){
            $proveedores=DB::table('proveedores as c')
            ->where('c.razon_social','LIKE',"%$proveedor%")
            ->paginate(2);
    
            return $proveedores;
        }else{
            $proveedores=DB::table('proveedores as c')
             ->paginate(2);
     
             return $proveedores;
        }

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
        $proveedor = new Proveedor;
        $proveedor->razon_social = $request->razon_social;
        $proveedor->cuit = $request->cuit;
        $proveedor->email = $request->email;
        $proveedor->telefono = $request->telefono;
        $proveedor->estado = '1';
        $proveedor->save();
        return 'Proveedor creado!!';
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
