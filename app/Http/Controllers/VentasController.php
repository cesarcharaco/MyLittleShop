<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ventas;
use App\Productos;
use App\User;
use App\Categorias;
use App\Carrito;
class VentasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Productos::where('disponible','>',0)->get();
        
        return view('ventas.index',compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function show_product($id_producto){

        $producto=Productos::find($id_producto);

        return view('ventas.show_product',compact('producto'));
    }

    public function addCarrito(Request $request){
        $buscar=Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->count();
        if($buscar>0){
            //buscando disponibilidad con respecto a la cantidad solicitada
            $producto=Productos::find($request->id_producto);
            if($producto->disponible < $request->cantidad){
                toastr()->warning('Alerta!!', 'La cantidad solicitada no se encuentra disponible para el producto seleccionado');
                return redirect()->back();                
            }else{
                //no hay ventas en proceso...
                $venta=new Ventas();
                $venta->id_user=\Auth::user()->id;
                $venta->fecha=date('Y-m-d');
                //calculando total
                $total=$producto->precio*$request->cantidad;

                $venta->total=$total;
                $venta->status="En Proceso";
                $venta->save();

                //agregando producto a carrito
                $carrito= new Carrito();
                $carrito->id_venta=$venta->id;
                $carrito->id_producto=$request->id_producto;
                $carrito->cantidad=$request->cantidad;
                $carrito->save();


                toastr()->success('Éxito!!', 'Producto Agregado al Carrito');
                return redirect()->back();

            }

        }else{
            $venta=Ventas::where('id_user',\Auth::user()->id)->where('status','En Proceso')->first();
            $producto=Productos::find($request->id_producto);

            if($producto->disponible < $request->cantidad){
                toastr()->warning('Alerta!!', 'La cantidad solicitada no se encuentra disponible para el producto seleccionado');
                return redirect()->back();                
            }else{
                //buscando en el carrito el producto ya cargado
                $encontrado=Carrito::where('id_venta',$venta->id)->where('id_producto',$request->id_producto)->count();
                if($encontrado > 0){
                    
                    $monto=$producto->precio*$request->cantidad;
                    $venta->total=$venta->total+$monto;
                    $venta->save();
                    //actualizando cantidad del producto en el carrito
                    $carrito=Carrito::where('id_venta',$venta->id)->where('id_producto',$request->id_producto)->first();
                    $carrito->cantidad=$carrito->cantidad+$request->cantidad;
                    $carrito->save();

                    toastr()->success('Éxito!!', 'Producto Agregado al Carrito');
                    toastr()->warning('Alerta!!', 'El producto ya estaba agregado, se ha aumentado la cantidad');
                    return redirect()->back();
                }else{
                    $monto=$producto->precio*$request->cantidad;
                    $venta->total=$venta->total+$monto;
                    $venta->save();
                    //agregando a carrito
                    $carrito= new Carrito();
                    $carrito->id_venta=$venta->id;
                    $carrito->id_producto=$request->id_producto;
                    $carrito->cantidad=$request->cantidad;
                    $carrito->save();

                    toastr()->success('Éxito!!', 'Producto Agregado al Carrito');
                    return redirect()->back();

                }

            }
        }            
    }

    public function removeCarrito(Request $request){
            
            $carrito=Carrito::where('id_venta',$request->id_venta)->where('id_producto',$request->id_producto)->first();
            $venta=Ventas::find($request->id_venta);
            $producto=Productos::find($request->id_producto);
            $monto=$producto->precio*$carrito->cantidad;
            $venta->total=$venta->total-$cantidad;
            $venta->save();
            $carrito->delete();

            toastr()->success('Éxito!!', 'Producto Removido del Carrito');
            return redirect()->back();
    }

    public function pagar(Request $request){

        $venta=Ventas::find($request->id_venta);
        $venta->referencia=$request->referencia;
        $venta->status="Esperando Confirmación";
        $venta->save();

        toastr()->success('Éxito!!', 'Pago registrado, debe esperar a la confirmación para aprobar su compra');
            return redirect()->back();
    }

    public function validarVenta(Request $request){

        if($request->opcion=="Aprobar"){
            $venta=Ventas::find($request->id_venta);
            $carrito=Carrito::where('id_venta',$request->id_venta)->get();

            //extrayendo y descontando de inventario
            foreach($carrito as $key){
                
                $producto=Productos::find($key->id_producto);
                $producto->disponible=$producto->disponible-$key->cantidad;
                $producto->existencia=$producto->existencia-$key->cantidad;
                $producto->vendidos=$producto->vendidos+$key->cantidad;
                $producto->save();

                //agregando productos a las ventas realizadas
                \DB::table('ventas_has_productos')->insert([
                        'id_venta' => $request->id_venta,
                        'id_producto' => $key->id_producto,
                        'cantidad' => $key->cantidad
                    ]);
                $key->delete();
            }
            $venta->status="Aprobada";
            $venta->save();

            toastr()->success('Éxito!!', 'La venta ha sido aprobada');
            return redirect()->back();
        }else{
            //declinada
            $venta=Ventas::find($request->id_venta);
            $carrito=Carrito::where('id_venta',$request->id_venta)->get();

            //extrayendo y descontando de inventario
            foreach($carrito as $key){
                $key->delete();
            }
            $venta->status="Declinada";
            $venta->save();

            toastr()->warning('Alerta!!', 'La venta ha sido declinada');
            return redirect()->back();          
        }
    }
}
