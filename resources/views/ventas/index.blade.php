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

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Productos</h3>
          <span class="section-divider"></span>
          
        </div>

        <div class="row no-gutters">
          @foreach($productos as $key)
            @foreach($key->imagenes as $key2)
              @if($key2->pivot->mostrar=="Si")
                <div class="col-12 col-sm-6 col-md-3 d-flex align-items-stretch pt-3 mb-3" style="padding: 10px;">
                  <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                      {!!$key->nombre!!}
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7"><br>
                          <p class="text-muted text-sm"><b>Precio: </b> {!!$key->precio_und!!} </p>
                          <p class="text-muted text-sm"><b>Cantidad disponible: </b> {!!$key->existencia!!} </p>
                        </div>
                        <div class="col-5 text-center">
                          <div class="gallery-item" data-aos="fade-up">
                            <a href="{{ asset($key2->url) }}" class="gallery-popup">
                              <img src="{{ asset($key2->url) }}" alt="" class="img-circle img-fluid">
                            </a>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="#" class="btn btn-sm btn-primary"> Ver más...</a>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- <div class="col-lg-4 col-md-6">
                  <div class="gallery-item" data-aos="fade-up">
                    @if(Auth::guest())
                                 
                    <a href="{{ asset($key2->url) }}" class="gallery-popup">
                      <img src="{{ asset($key2->url) }}" alt="">
                    </a>
                    @else
                      <a href="{{ asset($key2->url) }}" class="gallery-popup">
                      <img src="{{ asset($key2->url) }}" alt="">
                    </a>
                    @endif
                  </div>
                </div> -->
              @endif
            @endforeach
          @endforeach

        </div>

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

</body>
</html>
