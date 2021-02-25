@extends('layouts.app')
@section('title') Productos @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-users"></i> Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Productos</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
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
                    <a href="#" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a>
                    <a href="{{ route('productos.edit',$key->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i></a>
                    <a href="#" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
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
</script>
@endsection
