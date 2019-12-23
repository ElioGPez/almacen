<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_Venta extends Model
{
	protected $table = "linea_ventas";
    protected $primaryKey ="id";

    protected $filable = ['subtotal','cantidad','venta_id','producto_id'];
    
    public function venta()
    {
        return $this->belongsTo('App\Venta');
    }
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
