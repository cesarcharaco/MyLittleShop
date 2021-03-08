@extends('layouts.app')
@section('title') Ventas por Verificar @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-money"></i> Ventas por Verificar</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Ventas por Verificar</li>
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
        @include('ventas.aprobar')
        @include('ventas.declinar')
        </div>  
      </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            {{-- <h3 class="card-title"><i class="fa fa-users"></i> Productos</h3> --}}
            <div class="card-tools">
              {{-- <a href="{!! route('productos.create') !!}" class="btn bg-gradient-primary btn-sm pull-right"><i class="fas fa-upload"></i> Registro</a> --}}
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Correo</th>
                  <th>Código de Venta</th>
                  <th>Total a Pagar</th>
                  <th>Fecha</th>
                  <th>Referencia</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($ventas as $key)
                @if($key->status=="Esperando Confirmación")
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $key->users->name }}</td>
                  <td>{{ $key->users->email }}</td>
                  <td>{{ $key->id }}</td>
                  <td>{{ $key->total }}</td>
                  <td>{{ $key->fecha }}</td>
                  <td>{{ $key->referencia }}</td>
                  
                  <td>
                    <a href="#" role="button" aria-expanded="false" aria-controls="AprobarVenta" class="btn btn-success btn-sm" onclick="aprobar('{{$key->id}}')" data-toggle="tooltip" data-placement="top" title="Seleccione para aprobar la venta"><i class="fa fa-check"></i></a>

                    <a href="#" role="button" aria-expanded="false" aria-controls="DeclinarVenta" class="btn btn-danger btn-sm" onclick="declinar('{{$key->id}}')" data-toggle="tooltip" data-placement="top" title="Seleccione para declinar la venta"><i class="fa fa-ban"></i></a>

                    
                  </td>
                </tr>
                @endif
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>

@endsection
@section('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    
  });
  function aprobar(id) {
    $('#AprobarVenta').modal('show');
    $('#id_venta').val(id);
    //$('#lista').fadeOut('fast');
  }
  function declinar(id) {
    $('#DeclinarVenta').modal('show');
    $('#id_venta2').val(id);
    //$('#lista').fadeOut('fast');
  }
  
</script>
@endsection
