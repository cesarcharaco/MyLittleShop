@extends('layouts.app')
@section('title') Detalles de Venta @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-money"></i>Detalle de Venta</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Detalle de Venta</li>
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
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title"><i class="fa fa-user"></i> Datos del Cliente</h3><br>
          <div class="card-tools">
              <a href="{!! route('ventas.listar') !!}" class="btn bg-gradient-primary btn-sm pull-right"><i class="fas fa-mail-reply"></i> Volver</a>
          </div>
            <b>Nombre: </b>{{ $venta->users->name }}<br>
            <b>Correo: </b>{{ $venta->users->email }}<br>
            <b>Fecha de Venta: </b>{{ $venta->fecha }}<br>
            <b>Status: </b>{{ $venta->status }}<br>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Categoría</th>
                  <th>Precio Und</th>
                  <th>Cantidad</th>
                  <th>Descripción</th>
                </tr>
              </thead>
              <tbody>
              @if($venta->status=="Aprobada")
                @foreach($venta->productos as $key)
                
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $key->codigo }}</td>
                  <td>{{ $key->nombre }}</td>
                  <td>{{ $key->categorias->categoria }}</td>
                  <td>{{ $key->precio_und }}</td>
                  <td>{{ $key->pivot->cantidad }}</td>
                  <td>{{ $key->descripcion }}</td>
                </tr>
                
                @endforeach
              @else
              
                @foreach($venta->carrito as $key)
                
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $key->producto->codigo }}</td>
                  <td>{{ $key->producto->nombre }}</td>
                  <td>{{ $key->producto->categorias->categoria }}</td>
                  <td>{{ $key->producto->precio_und }}</td>
                  <td>{{ $key->cantidad }}</td>
                  <td>{{ $key->producto->descripcion }}</td>
                </tr>
                @endforeach
              
              @endif
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
