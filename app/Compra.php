<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
	protected $table = "compras";
    protected $primaryKey ="id";

    protected $filable = ['fecha','monto','empleado_id','proveedor_id'];
    
    public function proveedor()
    {
        return $this->belongsTo('App\Proveedor');
    }
    public function linea_compra()
    {
        return $this->hasMany('App\Linea_Compra');
    }
}
