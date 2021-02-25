<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorias;
use App\Productos;
class CategoriasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias=Categorias::all();

        $i=1;

        return view('categorias/index',compact('categorias','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categorias/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->categoria==""){
            toastr()->warning('Alerta!!', 'Debe ingresar el nombre de la categoría');
            return redirect()->back();
        }else{
            $buscar=Categorias::where('categoria',$request->categoria)->count();
            if($buscar > 0){
              toastr()->warning('Alerta!!', 'El nombre de la categoría ya existe registrado');  
              return redirect()->back();
            }else{
                $categoria=new Categorias();
                $categoria->categoria=$request->categoria;
                $categoria->save();
                toastr()->success('Éxito!!', 'Categoría registrada');
                return redirect()->to('categorias');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_categoria)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_categoria)
    {
        $categoria=Categorias::find($id_categoria);
        return view('categorias.edit',compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_categoria)
    {
        if($request->categoria==""){
            toastr()->warning('Alerta!!', 'Debe ingresar el nombre de la categoría');
            return redirect()->back();
        }else{
            $buscar=Categorias::where('categoria',$request->categoria)->where('id','<>',$id_categoria)->count();
            if($buscar > 0){
              toastr()->warning('Alerta!!', 'El nombre de la categoría ya existe registrado');  
              return redirect()->back();
            }else{
                $categoria=Categorias::find($id_categoria);
                $categoria->categoria=$request->categoria;
                $categoria->save();
                toastr()->success('Éxito!!', 'Categoría Actualizada');
                return redirect()->to('categorias');
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
        //dd($request->all());
        $productos=Productos::where('id_categoria',$request->id_categoria)->count();
        if($productos>0){
            toastr()->warning('Alerta!!', 'Categoría asignada a prducto(s), deberá cambiar la misma en los productos que la tengan');
                return redirect()->to('categorias');
        }else{
            $categoria=Categorias::find($request->id_categoria);
            if($categoria->delete()){
                toastr()->success('Éxito!!', 'Categoría eliminada');
                return redirect()->to('categorias');
            }else{
                toastr()->danger('Error!!', 'No se pudo eliminar la categoría');
                return redirect()->to('categorias');
            }
        }
    }
}
