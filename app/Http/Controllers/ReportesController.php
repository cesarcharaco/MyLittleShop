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
    	$clientes=User::all();
    	$ventas=Ventas::all();
    	$i=1;

    	return view('reportes.index',compact('productos','ventas','clientes','i'));
    }

    public function mostrar(Request $request){

    	//dd($request->all());
    	if($request->desde==null){
    		toastr()->warning('intente otra vez!!', 'Debe ingresar la fecha desde');
            return redirect()->back();
    	}else{
    		if($request->hasta==null){
    			toastr()->warning('intente otra vez!!', 'Debe ingresar la fecha hasta');
            	return redirect()->back();	
    		}else{
    			$status=array();
    			$i=0;
    			if($request->en_proceso!=null){
    				$status[$i]=$request->en_proceso;
    				$i++;
    			}
    			if($request->esperando!=null){
    				$status[$i]=$request->esperando;
    				$i++;
    			}
    			if($request->aprobada!=null){
    				$status[$i]=$request->aprobada;
    				$i++;
    			}
    			if($request->declinada!=null){
    				$status[$i]=$request->declinada;
    				$i++;
    			}
    			//datos para grafica
    			$en_proceso=0;
				$esperando=0;
				$aprobada=0;
				$declinada=0;
				$existencia=0;
				$disponible=0;
				$con_detalles=0;
				$vendidos=0;

		    	if(count($request->id_cliente)==0){
		    		//todos los clientes
		    		if(count($status)==0){
		    			//todos los status
		    			$ventas=Ventas::whereBetween('created_at', array($request->desde." 00:00:00", $request->hasta." 23:59:59"))->get();
		    			//datos para grafica de status
		    			foreach($ventas as $key){
		    				switch($key->status){
		    					case 'En Proceso': $en_proceso++; break;
		    					case 'Esperando por Confirmación': $esperando++; break;
		    					case 'Aprobada': $aprobada++; break;
		    					case 'Declinada': $declinada++; break;
		    				}
		    			}
		    			// datos para gráfica de cantidades
		    			foreach($ventas as $key){
		    				foreach($key->productos as $key2){
			    				$existencia+=$key2->existencia;
			    				$disponible+=$key2->disponible;
			    				$con_detalles+=$key2->con_detalles;
			    				$vendidos+=$key2->vendidos;
		    				}
		    			}
		    			//dd($ventas);
		    		}else{
		    			//solo algunos estados
		    			$ventas=Ventas::whereIn('status',$status)->whereBetween('created_at', array($request->desde." 00:00:00", $request->hasta." 23:59:59"))->get();
		    			//datos para grafica de status
		    			foreach($ventas as $key){
		    				switch($key->status){
		    					case 'En Proceso': $en_proceso++; break;
		    					case 'Esperando por Confirmación': $esperando++; break;
		    					case 'Aprobada': $aprobada++; break;
		    					case 'Declinada': $declinada++; break;
		    				}
		    			}
		    			// datos para gráfica de cantidades
		    			foreach($ventas as $key){
		    				foreach($key->productos as $key2){
			    				$existencia+=$key2->existencia;
			    				$disponible+=$key2->disponible;
			    				$con_detalles+=$key2->con_detalles;
			    				$vendidos+=$key2->vendidos;
		    				}
		    			}
		    			//dd($ventas);
		    		}

		    	}else{
		    		//cuando selecciona algunos clientes
					if(count($status)==0){
		    			//todos los status
		    			$ventas=Ventas::whereIn('id_user',$request->id_cliente)->whereBetween('created_at', array($request->desde." 00:00:00", $request->hasta." 23:59:59"))->get();
		    			//datos para grafica de status
		    			foreach($ventas as $key){
		    				switch($key->status){
		    					case 'En Proceso': $en_proceso++; break;
		    					case 'Esperando por Confirmación': $esperando++; break;
		    					case 'Aprobada': $aprobada++; break;
		    					case 'Declinada': $declinada++; break;
		    				}
		    			}
		    			// datos para gráfica de cantidades
		    			foreach($ventas as $key){
		    				foreach($key->productos as $key2){
			    				$existencia+=$key2->existencia;
			    				$disponible+=$key2->disponible;
			    				$con_detalles+=$key2->con_detalles;
			    				$vendidos+=$key2->vendidos;
		    				}
		    			}
		    			//dd($ventas);
		    		}else{
		    			//solo algunos estados
		    			$ventas=Ventas::whereIn('id_user',$request->id_cliente)->whereIn('status',$status)->whereBetween('created_at', array($request->desde." 00:00:00", $request->hasta." 23:59:59"))->get();
		    			//datos para grafica de status
		    			foreach($ventas as $key){
		    				switch($key->status){
		    					case 'En Proceso': $en_proceso++; break;
		    					case 'Esperando por Confirmación': $esperando++; break;
		    					case 'Aprobada': $aprobada++; break;
		    					case 'Declinada': $declinada++; break;
		    				}
		    			}
		    			// datos para gráfica de cantidades
		    			foreach($ventas as $key){
		    				foreach($key->productos as $key2){
			    				$existencia+=$key2->existencia;
			    				$disponible+=$key2->disponible;
			    				$con_detalles+=$key2->con_detalles;
			    				$vendidos+=$key2->vendidos;
		    				}
		    			}
		    			//dd($ventas);
		    		}		    		
		    	}
		    	$prueba=100;
		    	$desde=$request->desde;
		    	$hasta=$request->hasta;
		    	if($existencia==0 && $disponible==0 && $con_detalles==0 && $vendidos==0){
		    		$existen_ventas="no";
		    	}else{
		    		$existen_ventas="si";
		    	}
		    	if($en_proceso==0 && $esperando==0 && $aprobada==0 && $declinada==0){
		    		$existen_status="no";
		    	}else{
		    		$existen_status="si";
		    	}
		    	return view('reportes.ventas',compact('ventas','en_proceso','esperando','aprobada','declinada','existencia','disponible','con_detalles','vendidos','prueba','desde','hasta','existen_ventas','existen_status'));
    		}
    	}
    }
}
