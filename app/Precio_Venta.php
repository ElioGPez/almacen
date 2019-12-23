<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Precio_Venta extends Model
{
	protected $table = "precio_ventas";
    protected $primaryKey ="id";

    protected $filable = ['fecha','precio','producto_id'];

    public function producto()
    {
        return $this->belongsTo('App\Producto');
    }

}
