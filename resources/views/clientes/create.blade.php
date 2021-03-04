@extends('layouts.app')
@section('title') Registro Cliente @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-users"></i> Clientes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Registro de Cliente</li>
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
          {!! Form::open(['route' => ['clientes.store'], 'method' => 'POST', 'name' => 'registrar_cliente', 'id' => 'registrar_cliente', 'data-parsley-validate']) !!}
            @csrf
            <div class="card-header">
              <h3 class="card-title" style="margin-top: 5px;"><i class="fa fa-edit"></i> Registro</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="name">Nombre de Usuario <b style="color: red;">*</b></label>
                    <input type="text" name="name" id="name" class="form-control mayusculas" required="required" placeholder="Ingrese el nombre de usuario.." value="{!! old('name') !!}">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="email">Email <b style="color: red;">*</b></label>
                    <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror form-control mayusculas" required="required" placeholder="Ingrese email..." required data-parsley-length="[4, 24]" data-parsley-trigger="keyup" value="{!! old('email') !!}">
                  </div>
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="password">Contraseña <b style="color: red;">*</b></label>
                    <input type="password" name="password" id="password" class="form-control mayusculas" required="required" placeholder="Ingrese el password..." >
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label for="password_confirmation">Repetir Contraseña <b style="color: red;">*</b></label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control mayusculas" required="required" placeholder="Repita la contraseña...">
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
