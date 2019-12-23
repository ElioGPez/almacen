<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
	protected $table = "productos";
    protected $primaryKey ="id";

    protected $filable = ['descripcion','stock_minimo','tipo','categoria_id',
    'nombre','stock','fecha_vencimiento','codigo','precio_venta'];
    
    public function precio_venta()
    {
        return $this->hasMany('App\Precio_Venta');
    }
    public function categoria()
    {
        return $this->belongsTo('App\Categoria');
    }
    public function linea_venta()
    {
        return $this->hasMany('App\Linea_Venta');
    }
    public function linea_compra()
    {
        return $this->belongsTo('App\Linea_Compra');
    }
}
