<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
	protected $table = "proveedores";
    protected $primaryKey ="id";

    protected $filable = [
    'cuit','razon_social','email','telefono','estado'];

    public function domicilio()
    {
        return $this->belongsToMany('App\Domicilio');
    }
    public function compra()
    {
        return $this->hasMany('App\Compra');
    }
    
}
