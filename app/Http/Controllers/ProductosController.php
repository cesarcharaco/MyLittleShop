<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productos;
use App\Categorias;
use App\Imagenes;
use App\Http\Requests\ProductosRequest;
class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos=Productos::all();
        $i=1;
        return view('productos.index',compact('productos','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias=Categorias::all();
        return view('productos.create',compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductosRequest $request)
    {

        $buscar_nombre=Productos::where('nombre',$request->nombre)->count();
        $buscar_codigo=Productos::where('codigo',$request->codigo)->count();
        if($buscar_codigo>0){
            toastr()->warning('Alerta!!', 'El código ya se encuentra registrado');
            return redirect()->back();
        }else{
            if($buscar_nombre>0){
                toastr()->warning('Alerta!!', 'El nombre ya se encuentra registrado');
            return redirect()->back();
            }else{
                $validacion=$this->validar_imagen($request->file('fotos'));
                if($validacion['valida'] > 0){
                    toastr()->warning('intente otra vez!!', $validacion['mensaje'].'');
                    return redirect()->back();
                }
                $producto=new Productos();
                $producto->codigo=$request->codigo;
                $producto->nombre=$request->nombre;
                $producto->costo=$request->costo;
                $producto->id_categoria=$request->id_categoria;
                $producto->descripcion=$request->descripcion;
                $producto->existencia=$request->existencia;
                $producto->disponible=$request->disponible;
                $producto->precio_und=$request->precio_und;
                $producto->precio_mayor=$request->precio_mayor;
                $producto->con_detalles=$request->con_detalles;
                $producto->vendidos=$request->vendidos;
                if($request->status!=null){
                    $producto->status=$request->status;
                }else{
                    $producto->status="Inactivo";
                }
                $producto->save();
                
                //cargando fotos
                $fotos=$request->file('fotos');
                foreach($fotos as $foto){
                    $codigo=$this->generarCodigo();
                    /*
                    $validatedData = $request->validate([
                        'fotos' => 'mimes:jpeg,png'
                    ]);*/
                    $name=$codigo."_".$foto->getClientOriginalName();
                    $foto->move(public_path().'/img_productos', $name);  
                    $url ='img_productos/'.$name;
                    $img=new Imagenes();
                    $img->nombre=$name;
                    $img->url=$url;
                    $img->save();

                    $producto->imagenes()->attach($img);
                }
                toastr()->success('Éxito!!', 'Producto Registrado');
                return redirect()->to('productos');

            }
        }

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
    public function edit($id_producto)
    {
        $categorias=Categorias::all();
        $producto=Productos::find($id_producto);
        $total=count($producto->imagenes);
        $columnas=0;
        $colspan=$total%4;

        return view('productos.edit',compact('producto','categorias','total','columnas','colspan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductosRequest $request, $id_producto)
    {
        //dd($request->all());
        $buscar_nombre=Productos::where('nombre',$request->nombre)->where('id','<>',$id_producto)->count();
        $buscar_codigo=Productos::where('codigo',$request->codigo)->where('id','<>',$id_producto)->count();
        
        
        if($buscar_nombre > 0){
            toastr()->warning('Alerta!!', 'El nombre ya se encuentra registrado');
            return redirect()->back();    
        }else{
            if($buscar_codigo > 0){
                toastr()->warning('Alerta!!', 'El código ya se encuentra registrado');
                return redirect()->back();
            }else{
                if($request->fotos!=null){
                    $validacion=$this->validar_imagen($request->file('fotos'));
                    if($validacion['valida'] > 0){
                        toastr()->warning('intente otra vez!!', $validacion['mensaje'].'');
                        return redirect()->back();
                    }  
                }
                $producto=Productos::find($id_producto);
                $producto->codigo=$request->codigo;
                $producto->nombre=$request->nombre;
                $producto->costo=$request->costo;
                $producto->id_categoria=$request->id_categoria;
                $producto->descripcion=$request->descripcion;
                $producto->existencia=$request->existencia;
                $producto->disponible=$request->disponible;
                $producto->precio_und=$request->precio_und;
                $producto->precio_mayor=$request->precio_mayor;
                $producto->con_detalles=$request->con_detalles;
                $producto->vendidos=$request->vendidos;
                if($request->status!=null){
                    $producto->status=$request->status;
                }else{
                    $producto->status="Inactivo";
                }
                $producto->save();
                if($request->fotos!=null){
                    //cargando fotos
                $fotos=$request->file('fotos');
                    foreach($fotos as $foto){
                        $codigo=$this->generarCodigo();
                        /*
                        $validatedData = $request->validate([
                            'fotos' => 'mimes:jpeg,png'
                        ]);*/
                        $name=$codigo."_".$foto->getClientOriginalName();
                        $foto->move(public_path().'/img_productos', $name);  
                        $url ='img_productos/'.$name;
                        $img=new Imagenes();
                        $img->nombre=$name;
                        $img->url=$url;
                        $img->save();

                        $producto->imagenes()->attach($img);
                    }

                }
                toastr()->success('Éxito!!', 'Producto Actualizado');
                return redirect()->to('productos');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $producto=Productos::find($request->id_producto);
        foreach($producto->imagenes as $key){
            $url=$key->url;
            if($key->delete()){
                unlink($url);
            }
        }
        if($producto->delete()){
            toastr()->success('Éxito!!', 'Producto Eliminado');
            return redirect()->back();
        }else{
            toastr()->error('Error!!', 'El Producto no pudo ser Eliminado');
            return redirect()->back();
        }
    }

    public function eliminar_imagen(Request $request){

        $imagen=Imagenes::find($request->id_imagen);
        $url=$imagen->url;
        if($imagen->delete()){
            unlink($url);
            toastr()->success('Éxito!!', 'Imagen Eliminada');
                return redirect()->back();
        }else{
            toastr()->error('Error!!', 'La Imagen no pudo ser Eliminada');
                return redirect()->back();
        }
    }

    protected function validar_imagen($fotos)
    {
        //dd($fotos);
        $mensaje="";
        $valida=0;
        foreach($fotos as $foto){
            //dd('asasas');
            $img=getimagesize($foto);
            $size=$foto->getClientSize();
            $width=$img[0];
            $higth=$img[1];
        }

        //dd($size."-".$width."-".$higth);

        if ($size>819200) {
            $mensaje="Alguna imagen excede el límite de tamaño de 800 KB ";
            $valida++;
        }

        if ($width>1024) {
            $mensaje.=" | Alguna imagen excede el límite de ancho de 1024 KB ";
            $valida++;
        }

        if ($higth>800) {
            $mensaje.=" | ALguna imagen excede el límite de altura de 800 KB ";
            $valida++;
        }

        $respuesta=['mensaje' => $mensaje,'valida' => $valida];

        return $respuesta;
    }
    protected function generarCodigo() {
     $key = '';
     $pattern = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZ';
     $max = strlen($pattern)-1;
     for($i=0;$i < 4;$i++){
        $key .= $pattern=mt_rand(0,$max);
    }
     return $key;
    }
}
