<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Productos;
use App\Categorias;
use App\Ventas;

class ReportesController extends Controller
{
    public function index(){

    	$productos=Productos::all();

    	$ventas=Ventas::all();

    	return view('reportes.index',compact('productos','ventas'));
    }
}
