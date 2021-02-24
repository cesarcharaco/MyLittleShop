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
        <a href="#" class="brand-text font-weight-light" style="text-transform: uppercase;">{!! Auth::user()->name !!}</a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{ route('home') }}" class="nav-link {{ Request::is('home') ? 'active':'' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard <span class="right badge badge-danger">New</span></p>
          </a>
        </li>
        <li class="nav-header">HERRAMIENTAS</li>
        <li class="nav-item">
          <a href="#" class="nav-link {{ Request::is('users*') ? 'active':'' }}">
            <i class="nav-icon fa fa-users"></i>
            <p>Usuarios <span class="badge badge-info right">2</span></p>
          </a>
        </li>
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