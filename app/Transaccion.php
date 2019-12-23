<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaccion extends Model
{
	protected $table = "transacciones";
    protected $primaryKey ="id";

    protected $filable = [
    'pago','vuelto','fecha','cuenta_id'];

    public function cuenta()
    {
        return $this->belongsTo('App\Cuenta');
    }
}
