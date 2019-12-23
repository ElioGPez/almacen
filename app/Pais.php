<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
	protected $table = "paises";
    protected $primaryKey ="id";

    protected $filable = ['nombre'];


    public function provincia()
    {
        return $this->hasMany('App\Provincia');
    }
}
