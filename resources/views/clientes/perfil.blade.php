@extends('layouts.app')
@section('title') Perfil @endsection
@section('content')
<!-- Content Header (Page header) -->
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark"><i class="fa fa-user"></i> Perfil</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
          <li class="breadcrumb-item active">Perfil</li>
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
    <div class="row" id="lista">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            {{-- <h3 class="card-title"><i class="fa fa-tags"></i> Categorías</h3> --}}
            <div class="card-tools">
              <a href="{!! route('clientes.edit',\Auth::user()->id) !!}" class="btn bg-gradient-primary btn-sm pull-right"><i class="fas fa-edit"></i> Editar</a>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <b>Nombre: </b>{{ \Auth::user()->name }}<br>
            <b>Correo: </b>{{ \Auth::user()->email }}<br>
            <b>Tipo de Usuario: </b>{{ \Auth::user()->type_user }}
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

@endsection
