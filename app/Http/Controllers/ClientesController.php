<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Categorias;
use App\Productos;
use App\Http\Requests\ClientesRequests;
class ClientesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = User::where('type_user','Cliente')->get();
        $i=1;

        return view('clientes.index',compact('clientes','i'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('clientes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClientesRequests $request)
    {
        $buscar_email=User::where('email',$request->email)->count();
        $buscar_nombre=User::where('name',$request->name)->count();

        if($buscar_email > 0){
            toastr()->warning('Alerta!!', 'El email ya se encuentra registrado');
            return redirect()->back();
        }else{
            if($buscar_nombre > 0){
                toastr()->warning('Alerta!!', 'El nombre ya se encuentra registrado');
                return redirect()->back();
            }else{
                if($request->password!=$request->password_confirmation){
                    toastr()->warning('Alerta!!', 'Las contraseñas no coinciden');
                    return redirect()->back();  
                }else{
                    $cliente= new User();
                    $cliente->name=$request->name;
                    $cliente->email=$request->email;
                    $cliente->password=\Hash::make($request->password);
                    $cliente->save();

                    toastr()->success('Éxito!!', 'Cliente Registrado');
                    return redirect()->to('clientes');
                }
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
    public function edit($id_cliente)
    {
        $cliente=User::find($id_cliente);

        return view('clientes.edit',compact('cliente'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_cliente)
    {
        //dd($request->all());
        if($request->name==null){
            toastr()->warning('Alerta!!', 'El nombre no puede estar vacío');
            return redirect()->back();
        }
        if($request->email==null){
            toastr()->warning('Alerta!!', 'El email no puede estar vacío');
            return redirect()->back();
        }
        $buscar_email=User::where('email',$request->email)->where('id','<>',$id_cliente)->count();
        $buscar_nombre=User::where('name',$request->name)->where('id','<>',$id_cliente)->count();

        if($buscar_email > 0){
            toastr()->warning('Alerta!!', 'El email ya se encuentra registrado');
            return redirect()->back();
        }else{
            if($buscar_nombre > 0){
                toastr()->warning('Alerta!!', 'El nombre ya se encuentra registrado');
                return redirect()->back();
            }else{

                $cliente= User::find($id_cliente);
                $cliente->name=$request->name;
                $cliente->email=$request->email;
                if($request->cambiar_clave!=null){
                    if($request->password!=$request->password_confirmation){
                        toastr()->warning('Alerta!!', 'Las contraseñas no coinciden');
                        return redirect()->back();  
                    }else{

                    $cliente->password=\Hash::make($request->password);
                    }
                }
                $cliente->save();

                toastr()->success('Éxito!!', 'Cliente Actualizado');
                return redirect()->to('clientes');
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
        $cliente=User::find($request->id_cliente);
        //dd(count($cliente->ventas));
        if(count($cliente->ventas)>0){
            foreach($cliente->ventas as $key){
                $key->delete();
            }
            $cliente->delete();
            toastr()->success('Éxito!!', 'Cliente Eliminado');
            return redirect()->to('clientes');
        }else{
            $cliente->delete();
            toastr()->success('Éxito!!', 'Cliente Eliminado');
            return redirect()->to('clientes');
        }
    }

    public function cambiar_status(Request $request){
        $cliente=User::find($request->id_cliente);
        if($cliente->status=="Activo"){
            $cliente->status="Inactivo";
        }else{
            $cliente->status="Activo";
        }
        $cliente->save();
        toastr()->success('Éxito!!', 'Status del Cliente cambiado');
                return redirect()->to('clientes');
    }

    public function perfil(){

        return view('clientes.perfil');
    }
}
