<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="{{ url('home') }}" class="brand-link text-center">
    <span class="brand-text font-weight-light"><small>MyLittleShop</small></span>
  </a>
  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mb-3 d-flex">      
      <div class="brand-link text-center">
        <a href="#" class="brand-text font-weight-light" style="text-transform: uppercase;">@if(!\Auth::guest()) {!! Auth::user()->name !!} @endif</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        {{-- <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active':'' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard <span class="right badge badge-danger">New</span></p>
          </a>
        </li> --}}
        <li class="nav-header">Menú</li>
        @if(!\Auth::guest()) 
        @if(\Auth::user()->type_user=="Admin")
        <li class="nav-item">
          <a href="{!! route('clientes.index') !!}" class="nav-link {{ Request::is('clientes.index*') ? 'active':'' }}">
            <i class="nav-icon fa fa-users"></i>
            <p>Clientes {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('categorias.index') !!}" class="nav-link {{ Request::is('categorias.index*') ? 'active':'' }}">
            <i class="nav-icon fa fa-tags"></i>
            <p>Categorías {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('productos.index') !!}" class="nav-link {{ Request::is('productos.index*') ? 'active':'' }}">
            <i class="nav-icon fa fa-suitcase"></i>
            <p>Productos {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('productos.imagenes') !!}" class="nav-link {{ Request::is('productos.imagenes*') ? 'active':'' }}">
            <i class="nav-icon fa fa-image"></i>
            <!-- <ion-icon name="image-outline"></ion-icon> -->
            <p>Imágenes {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('ventas.por.verificar') !!}" class="nav-link {{ Request::is('ventas.por.verificar*') ? 'active':'' }}">            
            <i class="nav-icon fa fa-money-check-alt"></i>
            <p>Ventas P/Confirmar {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('reportes.index') !!}" class="nav-link {{ Request::is('reportes.index*') ? 'active':'' }}">
            
            <i class="nav-icon fas fa-chart-pie"></i>
            <p>Reportes {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        @endif
        @endif
        <li class="nav-item">
          <a href="{!! route('ventas.listar') !!}" class="nav-link {{ Request::is('ventas.listar*') ? 'active':'' }}">
            
            <i class="nav-icon fa fa-shopping-cart"></i>
            <p>Ventas {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{!! route('perfil.index') !!}" class="nav-link {{ Request::is('perfil.index*') ? 'active':'' }}">
            <i class="nav-icon fa fa-user"></i>
            <p>Perfil {{-- <span class="badge badge-info right">2</span> --}}</p>
          </a>
        </li>
        
        {{-- <li class="nav-item">
          <a href="{!! route('ejemplo') !!}" class="nav-link {{ Request::is('ejemplo*') ? 'active':'' }}">
            <i class="nav-icon fa fa-users"></i>
            <p>Ejemplo <span class="badge badge-info right">2</span></p>
          </a>
        </li> --}}
        <li class="nav-item">
          <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="nav-link">
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">@csrf</form>
            <i class="nav-icon fa fa-power-off text-danger"></i>
            <p>Cerrar sesión</p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>