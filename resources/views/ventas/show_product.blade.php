<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>My Little Shop</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="{{ asset('avilon/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('avilon/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,700|Open+Sans:300,300i,400,400i,700,700i" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{ asset('avilon/lib/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{ asset('avilon/lib/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
  <link href="{{ asset('avilon/lib/ionicons/css/ionicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('avilon/lib/aos/aos.css" rel="stylesheet') }}">
  <link href="{{ asset('avilon/lib/magnific-popup/magnific-popup.css') }}" rel="stylesheet">
<!-- Theme style -->
<link rel="stylesheet" href="{{ asset('admin/css/adminlte.min.css') }}">
<!-- Font Awesome -->
<link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Main Stylesheet File -->
  <link href="{{ asset('avilon/css/style.css') }}" rel="stylesheet">

  <!-- =======================================================
    Theme Name: My Little Shop
    Theme URL: https://bootstrapmade.com/avilon-bootstrap-landing-page-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#intro" class="scrollto">My Little Shop</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        {{-- <a href="#intro"><img src="logo.png" style="width: 40%" alt="" title="" /></img></a> --}}
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#intro">Home</a></li>
          <li><a href="#about">Nosotros</a></li>
          {{-- <li><a href="#features">Features</a></li> --}}
          {{-- <li><a href="#pricing">Precios</a></li> --}}
          <li><a href="#team">Equipo</a></li>
          <li><a href="#gallery">Galería</a></li>
          <li><a href="#contact">Contáctanos</a></li>
          @if (Auth::guest())
          <li class="#"><a href="#">Mi Cuenta</a>
            <ul>
              <li><a href="{{ route('login') }}">Iniciar Sesión</a></li>
              {{-- <li class="menu-has-children"><a href="#">Drop Down 2</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li> --}}
              <li><a href="{{ route('login') }}">Registrarse</a></li>
            </ul>
          </li>
          @else
            <li class="#"><a href="#">{{ Auth::user()->name }}</a>
            </li>
          @endif
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
  <main id="main">
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Producto</h3>
          <span class="section-divider"></span>
        </div>
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none">{!!$producto->nombre!!}</h3>
              <div class="col-12">
                @foreach($producto->imagenes as $key)
                  <img src="{!! asset($key->url) !!}" class="product-image" alt="Product Image" style="padding: 10px; height: 500px;">
                @endforeach
              </div>
              <div class="col-12 product-image-thumbs">
                @foreach($producto->imagenes as $key)
                <div class="product-image-thumb active"><img src="{!! asset($key->url) !!}" alt="Product Image"></div>
                @endforeach
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3">{!!$producto->nombre!!}</h3>
              <p style="width: 100%;">Descripción: {!!$producto->descripcion!!}</p>

              <hr>
              <div class="bg-gray py-2 px-3 mt-4">
                <h2 class="mb-0">
                  Precio: {!!$producto->precio_und!!}
                </h2>
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i> 
                  Agregar al carrito
                </div>
                <div class="btn btn-default btn-lg btn-flat">
                  <a href="{!! route('ventas.index') !!}" style="color: black;">Regresar</a>
                </div>
              </div>
            </div>
          </div><br><br>

      </div>
    </section><!-- #gallery -->


  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 text-lg-left text-center">
          <div class="copyright">
            &copy; Copyright <strong>My Little Shop</strong>. All Rights Reserved
          </div>
          <div class="credits">
            <!--
              All the links in the footer should remain intact.
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contacNosotroshttps://bootstrapmade.com/buy/?theme=My Little Shop
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
        <div class="col-lg-6">
          <nav class="footer-links text-lg-right text-center pt-2 pt-lg-0">
            <a href="#intro" class="scrollto">Home</a>
            <a href="#Nosotroslass="scrollto">About</a>
            <a href="#">Privacy Policy</a>
            <a href="#">Terms of Use</a>
          </nav>
        </div>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="{{ asset('avilon/lib/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('avilon/lib/jquery/jquery-migrate.min.js') }}"></script>
  <script src="{{ asset('avilon/lib/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('avilon/lib/easing/easing.min.js') }}"></script>
  <script src="{{ asset('avilon/lib/aos/aos.js') }}"></script>
  <script src="{{ asset('avilon/lib/superfish/hoverIntent.js') }}"></script>
  <script src="{{ asset('avilon/lib/superfish/superfish.min.js') }}"></script>
  <script src="{{ asset('avilon/lib/magnific-popup/magnific-popup.min.js') }}"></script>

  <!-- Contact Form JavaScript File -->
  <script src="{{ asset('avilon/contactform/contactform.js') }}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{ asset('avilon/js/main1.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('admin/js/adminlte.js') }}"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<!-- <script src="{{ asset('js/pages/dashboard.js') }}"></script> -->
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('admin/js/demo.js') }}"></script>
</body>
</html>
