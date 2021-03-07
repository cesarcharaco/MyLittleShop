@extends('layouts.app')
@section('title') Reportes @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="nav-icon fas fa-chart-pie"></i> Reportes</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Reportes</li>
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
        {{-- @include('productos.delete')
        @include('productos.show') --}}
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
            <div class="tab-content">
              <div class="form-group text-left">
                <div class="icheck-success d-inline">
                  <input type="checkbox" name="status" id="status" checked value="Activo">
                  <p align="center"><small>Todos los campos <b style="color: red;">*</b> son requeridos.</small><br>
                    <b style="color: blue;">*</b> <b style="color: red;"> <small>En caso de no seleccionar ninguno se generará para todos</small></b>
                  </p>
                </div>
              </div>
              <form action="{{ route('mostrar_reporte') }}" name="mostrar_reportes" method="POST">
              <div class="row">
                  @csrf
                  <div class="col-lg-6">
                    <div class="form-group">
                      <label>Cliente <b style="color: blue;">*</b></label>
                      <select class="form-control select2bs4" multiple="multiple" name="id_cliente[]">
                        @foreach($clientes as $key)
                          @if($key->type_user=="Cliente")
                            <option value="{{$key->id}}" style="color: black !important;">{{$key->name}} /{{$key->email}}</option>
                          @endif
                        @endforeach()
                          </select>
                    </div>                
                  </div>
              </div>
              <div class="row">
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Desde <b style="color: red;">*</b></label>
                      <input type="date" max="<?php echo date('Y-m-d');?>" class="form-control" name="desde" required="required">
                   </div>               
                  </div>
                  <div class="col-lg-3">
                    <div class="form-group">
                      <label>Hasta <b style="color: red;">*</b></label>
                      <input type="date" max="<?php echo date('Y-m-d');?>" class="form-control" name="hasta" required="required">
                  </div>                
                  </div>
                  <div class="col-lg-3">
                    <label for="">Status <b style="color: blue;">*</b></label>
                  <div class="custom-control custom-checkbox">
                      <input name="en_proceso" type="checkbox" class="custom-control-input" id="customCheck1" value="En Proceso">
                      <label class="custom-control-label" for="customCheck1">En Proceso</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                      <input name="esperando" type="checkbox" class="custom-control-input" id="customCheck2" value="Esperando Confirmación">
                      <label class="custom-control-label" for="customCheck2">Esperando Confirmación</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                      <input name="aprobada" type="checkbox" class="custom-control-input" id="customCheck3" value="Aprobada">
                      <label class="custom-control-label" for="customCheck1">Aprobada</label>
                  </div>
                  <div class="custom-control custom-checkbox">
                      <input name="declinada" type="checkbox" class="custom-control-input" id="customCheck4" value="Declinada">
                      <label class="custom-control-label" for="customCheck2">Declinada</label>
                  </div>          
                  </div>
              </div>
            <center>
              <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Generar</button>
            </center>
        </form>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>{{-- row --}}




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
                  <th>Código</th>
                  <th>Nombre</th>
                  <th>Status</th>
                  <th>Existencia</th>
                  <th>Disponibles</th>
                  <th>Con Detalles</th>
                  <th>Vendidos</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                @foreach($productos as $key)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $key->codigo }}</td>
                  <td>{{ $key->nombre }}</td>
                  <td>
                    @if($key->status=="Activo")
                    <p class="text-success"><b><i class="fa fa-check-circle"></i> Activo</b></p>
                    @else
                     <p class="text-danger"><b><i class="fa fa-check-circle"></i> Inactivo</b></p>
                     @endif
                  </td>
                  <td>{{ $key->existencia }}</td>
                  <td>{{ $key->disponible }}</td>
                  <td>{{ $key->con_detalles }}</td>
                  <td>{{ $key->vendidos }}</td>
                  <td>Acciones</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>{{-- row --}}
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

  $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
</script>

@endsection
