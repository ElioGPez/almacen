<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    protected $table = "ventas";
    protected $primaryKey ="id";

    protected $filable = ['fecha','monto','empleado_id','created_at'];
    
    public function cuenta()
    {
        return $this->belongsToMany('App\Cuenta');
    }
    public function linea_venta()
    {
        return $this->hasMany('App\Linea_Venta');
    }
    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }

}
