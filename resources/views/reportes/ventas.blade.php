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
            <a href="{{ route('reportes.index') }}"><button type="button" class="btn btn-info">Volver</button></a>
            <div class="tab-content">
              <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Status de Ventas: fechas: desde: <b>{{ $desde }}</b> - hasta: <b>{{ $hasta }} </b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                @if($existen_status!="no")
                <canvas id="status_ventas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                @else
                  <b>No existen ventas registradas</b>
                @endif
              </div>
             
            </div>
            <!-- /.card -->
            </div>

            <div class="tab-content">
              <div class="card card-success">
              <div class="card-header">
                <h3 class="card-title">Productos: fechas: desde: <b>{{ $desde }}</b> - hasta: <b>{{ $hasta }} </b></h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
                </div>
              </div>
              <div class="card-body">
                @if($existen_ventas!="no")
                <canvas id="productos" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
                @else
                  <b>No hay productos vendidos</b>
                @endif
              </div>
             
            </div>
            <!-- /.card -->
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
                </tr>
              </thead>
              <tbody>
              @foreach($ventas as $key)
                @foreach($key->productos as $key2)
                <tr>
                  <td>{{ $i }}</td>
                  <td>{{ $key2->codigo }}</td>
                  <td>{{ $key2->nombre }}</td>
                  <td>
                    @if($key2->status=="Activo")
                    <p class="text-success"><b><i class="fa fa-check-circle"></i> Activo</b></p>
                    @else
                     <p class="text-danger"><b><i class="fa fa-check-circle"></i> Inactivo</b></p>
                     @endif
                  </td>
                  <td>{{ $key2->existencia }}</td>
                  <td>{{ $key2->disponible }}</td>
                  <td>{{ $key2->con_detalles }}</td>
                  <td>{{ $key2->vendidos }}</td>
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
<!-- ChartJS -->
<script src="{{ asset('admin/plugins/chart.js/Chart.min.js') }}"></script>
<script type="text/javascript">
$(function () {
    /* ChartJS
     * -------
     * Here we will create a few charts using ChartJS
     */

    var statusData        = {
      labels: [
          'En Proceso', 
          'Esperando por Confirmación',
          'Aprobada', 
          'Declinada', 
      ],
      datasets: [
        {
          data: [<?=$en_proceso?>,<?=$esperando?>,<?=$aprobada?>,<?=$declinada?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartStatus = $('#status_ventas').get(0).getContext('2d')
    var pieData        = statusData;
    var pieOptions     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart = new Chart(pieChartStatus, {
      type: 'pie',
      data: pieData,
      options: pieOptions      
    })

    //productos
    var productosData        = {
      labels: [
          'Existencia', 
          'Disponibles',
          'Con Detalles', 
          'Vendidos', 
      ],
      datasets: [
        {
          data: [<?=$existencia?>,<?=$disponible?>,<?=$con_detalles?>,<?=$vendidos?>],
          backgroundColor : ['#f56954', '#00a65a', '#f39c12', '#00c0ef'],
        }
      ]
    }
    
    //-------------
    //- PIE CHART -
    //-------------
    // Get context with jQuery - using jQuery's .get() method.
    var pieChartProductos = $('#productos').get(0).getContext('2d')
    var pieData2        = productosData;
    var pieOptions2     = {
      maintainAspectRatio : false,
      responsive : true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var pieChart2 = new Chart(pieChartProductos, {
      type: 'pie',
      data: pieData2,
      options: pieOptions2      
    })

    
  })
</script>
@endsection
