<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuenta extends Model
{
	protected $table = "cuentas";
    protected $primaryKey ="id";

    protected $filable = ['saldo','cliente_id'];
    
    public function cliente()
    {
        return $this->belongsTo('App\Cliente');
    }
    public function transaccion()
    {
        return $this->hasMany('App\Transaccion');
    }
    public function venta()
    {
        return $this->belongsToMany('App\Venta');
    }

}
