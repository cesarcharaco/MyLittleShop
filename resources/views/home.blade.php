@extends('layouts.app')
@section('title') Home @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Dashboard</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
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
    @if(\Auth::user()->type_user=="Admin")
    <div class="row">
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>{{ venta_hoy_ep() }}</h3>

            <p>Ventas del día En Proceso</p>
          </div>
          <div class="icon">
            <i class="fa fa-shopping-cart text-white"></i>
          </div>
          <a href="{{ route('ventas.listar') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>{{ venta_hoy_ap() }}{{-- <sup style="font-size: 20px">%</sup> --}}</h3>
            <p>Ventas de hoy - Aprobadas</p>
          </div>
          <div class="icon">
            <i class="fa fa-cart-plus text-white"></i>
          </div>
          <a href="{{ route('ventas.listar') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>{{ clientes() }}</h3>

            <p>Clientes registrados</p>
          </div>
          <div class="icon">
            <i class="fa fa-users text-white"></i>
            <i class="icon-shopping-cart"></i>
          </div>
          <a href="{{ route('clientes.index') }}" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      {{-- <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>12</h3>

            <p>Usuarios registrados</p>
          </div>
          <div class="icon">
            <i class="far fa-user text-white"></i>
          </div>
          <a href="#" class="small-box-footer">Más información <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div> --}}
      <!-- ./col -->
    </div>
    @endif
    <!-- /.row -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
