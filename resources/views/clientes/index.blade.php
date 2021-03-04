@extends('layouts.app')
@section('title') Clientes @endsection
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
          <li class="breadcrumb-item active">Clientes</li>
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
        @include('clientes.delete')
        @include('clientes.cambiar_status')
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
            {{-- <h3 class="card-title"><i class="fa fa-users"></i> Clientes</h3> --}}
            <div class="card-tools">
              <a href="{!! route('clientes.create') !!}" class="btn bg-gradient-primary btn-sm pull-right"><i class="fas fa-upload"></i> Registro</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Nombre</th>
                  <th>Email</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($clientes as $key)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $key->name }}</td>
                  <td>{{ $key->email }}</td>
                  <td>

                    @if($key->status=="Activo")

                    <p class="text-success"><b><i class="fa fa-check-circle"></i> Activo</b></p>
                    @else
                     <p class="text-danger"><b><i class="fa fa-check-circle"></i> Inactivo</b></p>
                     @endif
                  </td>
                  <td>
                    {{-- <a href="#" role="button" aria-expanded="false" aria-controls="ShowProducto" class="btn btn-info btn-sm" onclick="showProducto('{{$key->codigo}}','{{$key->nombre}}','{{$key->existencia}}','{{$key->disponibles}}','{{$key->con_detalles}}','{{$key->vendidos}}')" data-toggle="tooltip" data-placement="top" title="Ver detalles del cliente"><i class="fa fa-search"></i></a> --}}

                    <a href="{{ route('clientes.edit',$key->id) }}" class="btn btn-warning btn-sm" data-toggle="tooltip" data-placement="top" title="Seleccione para editar los datos"><i class="fa fa-pencil-alt"></i></a>
                    
                    <a href="#" role="button" aria-expanded="false" aria-controls="EliminarCliente" class="btn btn-danger btn-sm" onclick="eliminarCliente('{{$key->id}}')" data-toggle="tooltip" data-placement="top" title="Seleccione para eliminar el cliente del sistema"><i class="fa fa-trash"></i></a>

                    <a href="#" role="button" aria-expanded="false" aria-controls="CambiarStatus" class="btn btn-info btn-sm" onclick="cambiarStatus('{{$key->id}}')" data-toggle="tooltip" data-placement="top" title="Seleccione para cambiar el status del cliente"><i class="fa  fa-check-square"></i></a>
                  </td>
                </tr>
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
<!-- /.content -->

@endsection
@section('scripts')
<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
  function eliminarCliente(id) {
    $('#EliminarCliente').modal('show');
    $('#id_cliente').val(id);
    //$('#lista').fadeOut('fast');
  }

  function cambiarStatus(id) {
    $('#CambiarStatus').modal('show');
    $('#id_cliente').val(id);
    //$('#lista').fadeOut('fast');
  }
  
</script>
@endsection
