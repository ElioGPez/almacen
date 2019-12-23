<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Domicilio extends Model
{
	protected $table = "domicilios";
    protected $primaryKey ="id";

    protected $filable = ['direccion','barrio','numero','localidad_id'];
    
    public function localidad()
    {
        return $this->belongsTo('App\Localidad');
    }
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function empleado()
    {
        return $this->belongsTo('App\Empleado');
    }
    public function proveedor()
    {
        return $this->belongsToMany('App\Proveedor');
    }
}
