<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use DB;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=DB::table('categorias as c');
       /* ->join('sub_categorias as sc','p.subcategoria_id','=','sc.id')
        ->join('categorias as c','sc.categoria_id','=','c.id')
        ->select('p.*')
        ->where('c.id','>','0')
        ->where('c.id','<','3')
        ->where('p.estado','=','activo')*/
        //->paginate(2);

        return $categorias->get();
    }

    public function filtro($categoria)
    {
        if($categoria != '_'){
            $categorias=DB::table('categorias as c')
            ->where('c.categoria','LIKE',"%$categoria%")
            ->paginate(2);
    
            return $categorias;
        }else{
            $categorias=DB::table('categorias as c')
             ->paginate(2);
     
             return $categorias;
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
        $categoria = new Categoria;
        $categoria->categoria = $request->categoria;
        $categoria->save();
        return 'categoria creada!!';
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
