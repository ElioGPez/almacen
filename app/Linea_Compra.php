<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Linea_Compra extends Model
{
	protected $table = "linea_compras";
    protected $primaryKey ="id";

    protected $filable = ['subtotal','cantidad','compra_id','producto_id'];
    
    public function compra()
    {
        return $this->belongsTo('App\Compra');
    }
    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }
}
