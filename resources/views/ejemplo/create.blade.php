@extends('layouts.app')
@section('title') Registro ejemplo @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-edit"></i> Ejemplo</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ejemplo</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
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
          <form action="#" class="form-horizontal" method="POST" data-parsley-validate autocomplete="off" id="registerUser">
            @csrf
            <div class="card-header">
              <h3 class="card-title" style="margin-top: 5px;"><i class="fa fa-edit"></i> Registro</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <div class="card-body">
              <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small></p>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="code">Código <b style="color: red;">*</b></label>
                    <input type="text" name="code" id="code" class="form-control mayusculas" required="required" placeholder="Ingrese código.." readonly="readonly" value="00001">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="names">Nombres <b style="color: red;">*</b></label>
                    <input type="text" name="names" id="names" class="form-control mayusculas" required="required" placeholder="Ingrese nombres.." value="{!! old('names') !!}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label for="surnames">Apellidos <b style="color: red;">*</b></label>
                    <input type="text" name="surnames" id="surnames" class="form-control mayusculas" required="required" placeholder="Ingrese apellidos..." value="{!! old('surnames') !!}">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="email">Email <b style="color: red;">*</b></label>
                    <input type="email" name="email" id="email" class="@error('email') is-invalid @enderror form-control mayusculas" required="required" placeholder="Ingrese email..." required data-parsley-length="[4, 24]" data-parsley-trigger="keyup" value="{!! old('email') !!}">
                  </div>
                  @error('email')
                    <div class="alert alert-danger">{{ $message }}</div>
                  @enderror
                </div>
                <div class="col-md-4">
                  <div class="form-group">
                    <label for="date_nac">Fecha de nacimiento <b style="color: red;">*</b></label>
                    <input type="date" name="date_nac" id="date_nac" class="form-control" required="required" placeholder="Ingrese contraseña...">
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="form-group text-center" style="margin-top: 40px;">
                    <div class="icheck-success d-inline">
                      <input type="checkbox" name="status" id="status" checked value="Activo">
                      <label for="status">Activo <b style="color: red;">*</b></label>
                    </div>
                  </div>
                </div>                
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-info float-right">Guardar</button>
              <button type="reset" class="btn btn-default">Cancelar</button>
            </div>
          </form>
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
