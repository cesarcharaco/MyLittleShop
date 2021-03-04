@extends('layouts.app')
@section('title') Actualización de Categoría @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-tags"></i> Categorías</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Actualización de Categoría</li>
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
          
          {!! Form::open(['route' => ['categorias.update',$categoria->id], 'method' => 'PUT', 'name' => 'modificar_categoria', 'id' => 'modificar_categoria', 'data-parsley-validate']) !!}
            @csrf
            <div class="card-header">
              <h3 class="card-title" style="margin-top: 5px;"><i class="fa fa-edit"></i> Actualización</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="categoria">Nombre de la Categoría<b style="color: red;">*</b></label>
                    <input type="text" name="categoria" id="categoria" class="form-control mayusculas" required="required"  placeholder="Ingrese nombre de la categoría.." value="{!! $categoria->categoria !!}">
                  </div>
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

@endsection
