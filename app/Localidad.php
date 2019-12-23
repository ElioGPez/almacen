<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Localidad extends Model
{
	protected $table = "localidades";
    protected $primaryKey ="id";

    protected $filable = ['nombre','provincia_id'];

    public function provincia()
    {
        return $this->belongsTo('App\Provincia');
    }
    public function domicilio()
    {
        return $this->hasMany('App\Domicilio');
    }
}
