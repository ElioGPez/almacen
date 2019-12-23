<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Provincia;
use App\Cliente;
use App\Cuenta;
use App\Domicilio;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes=DB::table('clientes as c');
        return $clientes->get();  
    }
    public function localidades()
    {
        $provincias = Provincia::with(['localidad'
        ]);
        /*$provincias=DB::table('provincias as p')
        ->join('localidades as l','l.provincia_id','=','p.id')
        ->select('p.*,l.*');*/
        return $provincias->get();  
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
        $cliente = new Cliente;
        $cliente->nombre = $request->nombre;
        $cliente->apellido = $request->apellido;
        $cliente->dni = $request->dni;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->estado = '0';

        $domicilio = new Domicilio;
        $domicilio->direccion = $request->domicilio;
        $domicilio->localidad_id = $request->localidad_id;
        $domicilio->save();

        $cliente->domicilio_id = $domicilio->id;
        $cliente->save();

        $cuenta = new Cuenta;
        $cuenta->saldo = 0;
        $cuenta->cliente_id = $cliente->id;
        $cuenta->save();   

        return 'Cliente REGISTRADO!!';    }

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
    public function cuenta($id)
    {
        $cuenta = Cuenta::with(['cliente','transaccion'
        ])
        ->where('cliente_id','=',$id);

        /*$cuanta=DB::table('cuentas as c')
        ->where('c.cliente_id','=',$id);*/

        return $cuenta->get();
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
