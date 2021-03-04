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
          <li class="breadcrumb-item active">Productos</li>
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
        @include('productos.delete')
        @include('productos.show')
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
              <a href="{!! route('productos.create') !!}" class="btn bg-gradient-primary btn-sm pull-right"><i class="fas fa-upload"></i> Registro</a>
            </div>
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
                  <th>Costo</th>
                  <th>Precio Und</th>
                  <th>Precio Mayor</th>
                  <th>Descripción</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productos as $key)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $key->codigo }}</td>
                  <td>{{ $key->nombre }}</td>
                  <td>{{ $key->categorias->categoria }}</td>
                  <td>{{ $key->costo }}</td>
                  <td>{{ $key->precio_und }}</td>
                  <td>{{ $key->precio_mayor }}</td>
                  <td>{{ $key->descripcion }}</td>
                  <td>
                    @if($key->status=="Activo")
                    <p class="text-success"><b><i class="fa fa-check-circle"></i> Activo</b></p>
                    @else
                     <p class="text-danger"><b><i class="fa fa-check-circle"></i> Inactivo</b></p>
                     @endif
                  </td>
                  <td>
                    <a href="#" role="button" aria-expanded="false" aria-controls="ShowProducto" class="btn btn-info btn-sm" onclick="showProducto('{{$key->codigo}}','{{$key->nombre}}','{{$key->existencia}}','{{$key->disponibles}}','{{$key->con_detalles}}','{{$key->vendidos}}')" data-toggle="tooltip" data-placement="top" title="Ver detalles del producto"><i class="fa fa-search"></i></a>

                    <a href="{{ route('productos.edit',$key->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i></a>
                    
                    <a href="#" role="button" aria-expanded="false" aria-controls="EliminarProducto" class="btn btn-danger btn-sm" onclick="eliminarProducto('{{$key->id}}')" data-toggle="tooltip" data-placement="top" title="Seleccione para eliminar la producto del sistema"><i class="fa fa-trash"></i></a>

                    
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
  function eliminarProducto(id) {
    $('#EliminarProducto').modal('show');
    $('#id_producto').val(id);
    //$('#lista').fadeOut('fast');
  }
  function showProducto(codigo,nombre,existencia,disponibles,detalles,vendidos){
    $('#ShowProducto').modal('show');
    $('#show_codigo').text(codigo);
    $('#show_nombre').text(nombre);
    $('#show_existencia').text(existencia);
    $('#show_detalles').text(detalles);
    $('#show_vendidos').text(vendidos);
    $('#show_disponibles').text(disponibles);
  }

  
</script>
@endsection
