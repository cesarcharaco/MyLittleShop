@extends('layouts.app')
@section('title') Registro Productos @endsection
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
          <li class="breadcrumb-item active">Registro de Productos</li>
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
      <div class="col-md-12">
        <!-- Horizontal Form -->
        <div class="card card-primary card-outline">
          {!! Form::open(['route' => ['productos.store'], 'method' => 'POST', 'name' => 'registrar_producto', 'id' => 'registrar_producto', 'data-parsley-validate', 'enctype' => 'Multipart/form-data']) !!}
            @csrf
            <div class="card-header">
              <h3 class="card-title" style="margin-top: 5px;"><i class="fa fa-upload"></i> Registro Producto</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">

              <div class="form-group text-left">
                    <div class="icheck-success d-inline">
                      <input type="checkbox" name="status" id="status" checked value="Activo">
                      <label for="status">Activo</label>
                      <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
                    </div>
                  </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="code">Código <b style="color: red;">*</b></label>
                    <input type="text" name="codigo" id="codigo" class="form-control mayusculas" required="required" placeholder="Ingrese código.." value="{{ old('codigo') }}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="nombre">Nombre <b style="color: red;">*</b></label>
                    <input type="text" name="nombre" id="nombre" class="form-control mayusculas" required="required" placeholder="Ingrese nombres.." value="{!! old('nombre') !!}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="costo">Costo <b style="color: red;">*</b></label>
                    <input type="number" name="costo" id="costo" class="form-control mayusculas" required="required" min="0" placeholder="Ingrese apellidos..." value="{!! old('costo') !!}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="descripcion">Descripción</label>
                    <textarea name="descripcion" id="descripcion" class="form-control mayusculas" placeholder="Ingrese descripcion..." data-parsley-trigger="keyup" rows="5" cols="10">{!! old('descripcion') !!}</textarea>
                  </div>
                  @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="existencia">Existencia <b style="color: red;">*</b></label>
                    <input type="number" name="existencia" id="existencia" class="form-control" required="required" placeholder="0" min="0" value="{{ old('existencia') }}">
                  </div>
                  <div class="form-group">
                    <label for="disponible">Disponible <b style="color: red;">*</b></label>
                    <input type="number" name="disponible" id="disponible" class="form-control" required="required" placeholder="0" min="0" value="{{ old('disponible') }}">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="precio_und">Precio Unidad<b style="color: red;">*</b></label>
                    <input type="number" name="precio_und" id="precio_und" class="form-control" required="required" placeholder="0" min="0" value="{{ old('precio_und') }}">
                  </div>
                  <div class="form-group">
                    <label for="precio_mayor">Precio Mayor</label>
                    <input type="number" name="precio_mayor" id="precio_mayor" class="form-control" placeholder="0" value="0" min="0">
                  </div>
                </div>                
              </div>
              <div class="row">
              	<div class="col-md-4">
              		<div class="form-group">
                    <label for="con_detalles">Con Detalles</label>
                    <input type="number" name="con_detalles" id="con_detalles" class="form-control" placeholder="0" value="0" min="0">
                  </div>
                  <div class="form-group">
                    <label for="vendidos">Vendidos</label>
                    <input type="number" name="vendidos" id="vendidos" class="form-control" placeholder="0" value="0" min="0">
                  </div>
              	</div>
              	<div class="col-md-4">
              	  <div class="form-group">
                    <label for="id_categoria">Categoría <b style="color: red;">*</b></label>
                    <select name="id_categoria" id="id_categoria" class="form-control select2bs4" required="required">
                    	@foreach($categorias as $key)
                    	<option value="{{ $key->id }}">{{ $key->categoria }}</option>
                    	@endforeach
                    </select>
                  </div>
              	</div>
              	<div class="col-md-4">
              	  <div class="form-group">
                    <label for="fotos">Fotos <b style="color: red;">*</b></label>
                    <input type="file" multiple="multiple" accept="image/*" name="fotos[]" id="fotos" class="form-control" >
                  </div>
              	</div>
              </div>
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
@endsection
@section('scripts')
<script type="text/javascript">
	$('.select2bs4').select2({
      theme: 'bootstrap4'
    });
	
</script>
@endsection
