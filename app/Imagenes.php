<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Imagenes extends Model
{
    protected $table='imagenes';

    protected $fillable=['id','nombre','url'];

    public function productos(){

    	return $this->belongsToMany('App\Productos','productos_has_imagenes','id_imagen','id_producto');
    }
}
