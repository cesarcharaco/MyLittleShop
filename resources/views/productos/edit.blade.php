@extends('layouts.app')
@section('title') Productos @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-suitcase"></i> Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Actualización Productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
    <div class="row">
    	<div class="col-md-12">
    		@include('flash::message')
	    @if(count($errors))
	        <div class="alert-list m-4">
	            <div class="alert alert-danger alert-dismissible" role="alert">
	                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
	                    <span aria-hidden="true">&times;</span>
	                </button>
	                <ul>
	                    @foreach($errors->all() as $error)
	                        <li>{{$error}}</li>
	                    @endforeach
	                </ul>
	            </div>
	        </div>
	    @endif
    	</div>	
    </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-12">
        <!-- Horizontal Form -->
        <div class="card card-primary card-outline">
          {!! Form::open(['route' => ['productos.update',$producto->id], 'method' => 'PUT', 'name' => 'registrar_producto', 'id' => 'registrar_producto', 'data-parsley-validate', 'enctype' => 'Multipart/form-data']) !!}
            @csrf
            <div class="card-header">
              <h3 class="card-title" style="margin-top: 5px;"><i class="fa fa-edit"></i> Actualización</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <div class="form-group text-left">
                <div class="icheck-success d-inline">
                  <input type="checkbox" name="status" id="status" @if($producto->status=="Activo") checked @endif value="Activo">
                  <label for="status">Activo</label>
                  <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
                </div>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="code">Código <b style="color: red;">*</b></label>
                    <input type="text" name="codigo" id="codigo" class="form-control mayusculas" required="required" placeholder="Ingrese código.." value="{{ $producto->codigo }}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="nombre">Nombre <b style="color: red;">*</b></label>
                    <input type="text" name="nombre" id="nombre" class="form-control mayusculas" required="required" placeholder="Ingrese nombres.." value="{!! $producto->nombre !!}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="costo">Costo <b style="color: red;">*</b></label>
                    <input type="number" name="costo" id="costo" class="form-control mayusculas" required="required" min="0" placeholder="Ingrese apellidos..." step="0.01" value="{!! $producto->costo !!}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control mayusculas" placeholder="Ingrese descripcion..." data-parsley-trigger="keyup" rows="5" cols="10">{!! $producto->descripcion !!}</textarea>
                  </div>
                  @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="existencia">Existencia <b style="color: red;">*</b></label>
                    <input type="number" step="0.01" name="existencia" id="existencia" class="form-control" required="required" placeholder="0" min="0" value="{{ $producto->existencia }}">
                  </div>
                  <div class="form-group">
                    <label for="disponible">Disponible <b style="color: red;">*</b></label>
                    <input type="number" step="0.01" name="disponible" id="disponible" class="form-control" required="required" placeholder="0" min="0" value="{{ $producto->disponible }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="precio_und">Precio Unidad<b style="color: red;">*</b></label>
                    <input type="number" step="0.01" name="precio_und" id="precio_und" class="form-control" required="required" placeholder="0" min="0" value="{{ $producto->precio_und }}">
                  </div>
                  <div class="form-group">
                    <label for="precio_mayor">Precio Mayor</label>
                    <input type="number" step="0.01" name="precio_mayor" id="precio_mayor" class="form-control" placeholder="0" value="{{ $producto->precio_mayor }}" min="0">
                  </div>
                </div>                
              </div>
              <div class="row">
              	<div class="col-md-3">
              		<div class="form-group">
                    <label for="con_detalles">Con Detalles</label>
                    <input type="number" step="0.01" name="con_detalles" id="con_detalles" class="form-control" placeholder="0" value="{{ $producto->con_detalles }}" min="0">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="vendidos">Vendidos</label>
                    <input type="number" step="0.01" name="vendidos" id="vendidos" class="form-control" placeholder="0" value="{{ $producto->vendidos }}" min="0">
                  </div>
              	</div>
              	<div class="col-md-3">
              	  <div class="form-group">
                    <label for="id_categoria">Categoría <b style="color: red;">*</b></label>
                    <select name="id_categoria" id="id_categoria" class="form-control select2bs4" required="required" style="width: 100%;">
                    	@foreach($categorias as $key)
                    	<option value="{{ $key->id }}" @if($producto->id_categoria==$key->id ) selected="selected" @endif >{{ $key->categoria }}</option>
                    	@endforeach
                    </select>
                  </div>
              	</div>
              	<div class="col-md-3">
              	  <div class="form-group">
                    <label for="fotos1" class="">Fotos</label>
                    <div class="custom-file">
                      <label for="fotos" class="custom-file-label">Seleccione fotos... </label>
                      <input type="file" multiple="multiple" accept="image/*" name="fotos[]" id="fotos" class="custom-file-input" >
                    </div>
                  </div>
              	</div>
              </div>
            </div>
            {{-- padding-top: 5px; --}}
            <div class="row mt-4" style="padding: 15px;">
          		@foreach($producto->imagenes as $key)
              	<div class="col-sm-3" style="border: 1px solid black; padding: 20px;">
                  <div class="position-relative">
                  	<div style="float: right; padding-right: 25px;">
                  	<button type="button" class="btn btn-danger btn-sm"data-toggle="modal" data-target="#modal-eliminar-imagen" title="click para eliminar la imagen"  style="float: right;position: absolute;"  onclick="delete_imagen({{ $key->id }})">
                  		<i class="fa fa-trash"></i>
                  	</button>
                  	</div>
            		   	<img src="{{ asset($key->url) }}" class="img-fluid"/>
            		  
                  </div>
              	</div>
          		@endforeach
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info float-right">Guardar</button>
              <button type="reset" class="btn btn-danger">Cancelar</button>
            </div>
          {!! Form::close() !!}
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>
		<!-- /.content -->
<div class="modal fade" id="modal-eliminar-imagen">
    <div class="modal-dialog">
      <div class="modal-content bg-danger">
        <div class="modal-header">
          <h4 class="modal-title">Eliminar Imagen</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        {!! Form::open(['route' => ['eliminar_imagen'], 'method' => 'POST', 'name' => 'eliminar_imagen', 'id' => 'eliminar_imagen', 'data-parsley-validate']) !!}
            @csrf
        <div class="modal-body">
          <p>Está seguro de eliminar la imagen? No podrá deshacer ésta acción</p>
          <input type="hidden" name="id_imagen" id="id_imagen">
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-outline-light" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-outline-light">Eliminar</button>
        </div>
        {!! Form::close() !!}
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
  <!-- /.modal -->
@endsection
@section('scripts')

<script type="text/javascript">
	
	function delete_imagen(id_imagen){
		
		$("#id_imagen").val(id_imagen);
	}	

	$('.select2bs4').select2({
      theme: 'bootstrap4'
    });
	


</script>
@endsection
