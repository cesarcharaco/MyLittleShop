<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ventas extends Model
{
    protected $table='ventas';

    protected $fillable=['id_user','fecha','total','referencia','status'];

    public function productos(){

        return $this->belongsToMany('App\Productos','productos_has_ventas','id_venta','id_producto')->withPivot('cantidad');
    }

    public function users(){

    	return $this->belongsTo('App\User','id_user');
    }

    public function carrito(){

    	return $this->hasMany('App\Carrito','id_venta','id');
    }
}
