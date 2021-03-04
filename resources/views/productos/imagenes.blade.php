@extends('layouts.app')
@section('css')
<style type="text/css" media="screen">
  img {
        display: block;
        margin: 0 auto;
        max-width: 25%;
      }
</style>
@endsection
@section('title')Imágenes de Productos @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-suitcase"></i>Productos</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Imágenes de Productos</li>
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
        @include('productos.mostrar')
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
                  <th>Img</th>
                  <th>Status</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productos as $key)
                @foreach($key->imagenes as $key2)
                <tr>
                  <td>{{ $i++ }}</td>
                  <td>
                    
                    <a href="{{ asset($key2->url) }}"  class="gallery-popup"><img src="{{ asset($key2->url) }}"  /></a>
                    
                  </td>
                  
                  <td>
                    @if($key2->pivot->mostrar=="Si")
                    <p class="text-success"><b><i class="fa fa-check-circle"></i> Mostrada</b></p>
                    @else
                     <p class="text-danger"><b><i class="fa fa-check-circle"></i> No Mostrada</b></p>
                     @endif
                  </td>
                  <td>
                    <a href="#" role="button" aria-expanded="false" aria-controls="Mostrar" class="btn btn-info btn-sm" onclick="Mostrar('{{$key->id}}','{{ $key2->pivot->mostrar }}')" dataproducto="tooltip" data-placement="top" title="Seleccione para mostrar o no la imagen en el portal"><i class="fa  fa-check-square"></i></a>
                  </td>
                </tr>
                @endforeach
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
 
  function Mostrar(id,status) {
    $('#Mostrar').modal('show');
    $('#id_imagen').val(id);
    $('#status').val(status);
    //$('#lista').fadeOut('fast');
  }
</script>
@endsection