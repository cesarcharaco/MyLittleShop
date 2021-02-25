@extends('layouts.app')
@section('title') Categorías @endsection
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
          <li class="breadcrumb-item active">Categorías</li>
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
        @include('categorias.delete')
        </div>  
      </div>
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <!-- Small boxes (Stat box) -->
    <div class="row" id="lista">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            {{-- <h3 class="card-title"><i class="fa fa-tags"></i> Categorías</h3> --}}
            <div class="card-tools">
              <a href="{!! route('categorias.create') !!}" class="btn bg-gradient-primary btn-sm pull-right"><i class="fas fa-edit"></i> Registro</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Categoría</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($categorias as $key)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>{{ $key->categoria }}</td>
                  <td>
                    {{-- <a href="#" class="btn btn-info btn-sm"><i class="fa fa-search"></i></a> --}}
                    <a href="{{ route('categorias.edit',$key->id) }}" class="btn btn-warning btn-sm"><i class="fa fa-pencil-alt"></i></a>
                    <a href="#" role="button" aria-expanded="false" aria-controls="EliminarCategoria" class="btn btn-danger btn-sm" onclick="eliminarCategoria('{{$key->id}}')"data-toggle="tooltip" data-placement="top" title="Seleccione para eliminar la categoría del sistema">
                                            <i class="fa fa-trash"></i>
                                        </a>
                    
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
  function eliminarCategoria(id) {
        $('#EliminarCategoria').modal('show');
        $('#id_categoria').val(id);
        //$('#lista').fadeOut('fast');
  }
  function cerrar(opcion) {
      $('#lista').fadeIn('fast');
      // $('.multi-collapse').collapse('hide');
    }
</script>
@endsection
