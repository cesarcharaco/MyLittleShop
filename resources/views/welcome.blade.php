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

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">

    <div class="intro-text">
      <h2>Bienvenido a My Little Shop</h2>
      <p>Tenemos los mejores precios con mejor calidad en el mercado</p>
      <a href="#about" class="btn-get-started scrollto">Comienza</a>
    </div>

    <div class="product-screens">

      <div class="product-screen-1" data-aos="fade-up" data-aos-delay="400">
      <img src="{{ $imagenes[0] }}" alt="">
      </div>

      <div class="product-screen-2" data-aos="fade-up" data-aos-delay="200">
        <img src="{{ $imagenes[1] }}" alt="">
      </div>

      <div class="product-screen-3" data-aos="fade-up">
        <img src="{{ $imagenes[2] }}" alt="">
      </div>

    </div>

  </section><!-- #intro -->

  <main id="main">

    <!--==========================
      About Us Section
    ============================-->
    <section id="about" class="section-bg">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Nosotros</h3>
          <span class="section-divider"></span>
          <p class="section-description">
            Somos una empresa lider en la ventas online, con nuestros productos,<br> ofreciéndote una cómoda compra, podrás disfrutar de nuestros productos muy rápido, ya que tú eres nuestra prioridad
          </p>
        </div>

        <div class="row">
          <div class="col-lg-6 about-img" data-aos="fade-right">
            <img src="{{ asset('avilon/img/about-img.jpg') }}" alt="">
          </div>

          <div class="col-lg-6 content" data-aos="fade-left">
            <h2>Asesoría online, consultas y compras</h2>
            <h3>Podrás visualizar los productos con detalle antes de agregar al carrito</h3>
            <p>
              Nuestro productos cuentan con la calidad de primera, todos son con precisión los que verás en las imágenes de manera que las dimensiones y estado de los mismos son tal cual como aparecen en la descripción
            </p>

            {{-- <ul>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
              <li><i class="ion-android-checkmark-circle"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
              <li><i class="ion-android-checkmark-circle"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate trideta storacalaperda mastiro dolore eu fugiat nulla pariatur.</li>
            </ul>

            <p>
              Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum Libero justo laoreet sit amet cursus sit amet dictum sit. Commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend donec
            </p> --}}
          </div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Product Featuress Section
    ============================-->
    {{-- <section id="features">
      <div class="container">

        <div class="row">

          <div class="col-lg-8 offset-lg-4">
            <div class="section-header" data-aos="fade" data-aos-duration="1000">
              <h3 class="section-title">Product Featuress</h3>
              <span class="section-divider"></span>
            </div>
          </div>

          <div class="col-lg-4 col-md-5 features-img">
            <img src="{{ asset('avilon/img/product-features.png') }}" alt="" data-aos="fade-right" data-aos-easing="ease-out-back">
          </div>

          <div class="col-lg-8 col-md-7 ">

            <div class="row">

              <div class="col-lg-6 col-md-6 box" data-aos="fade-left">
                <div class="icon"><i class="ion-ios-speedometer-outline"></i></div>
                <h4 class="title"><a href="">Lorem Ipsum</a></h4>
                <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident clarida perendo.</p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-left" data-aos-delay="100">
                <div class="icon"><i class="ion-ios-flask-outline"></i></div>
                <h4 class="title"><a href="">Dolor Sitema</a></h4>
                <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata noble dynala mark.</p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-left" data-aos-delay="200">
                <div class="icon"><i class="ion-social-buffer-outline"></i></div>
                <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
                <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur teleca starter sinode park ledo.</p>
              </div>
              <div class="col-lg-6 col-md-6 box" data-aos="fade-left" data-aos-delay="300">
                <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
                <h4 class="title"><a href="">Magni Dolores</a></h4>
                <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum dinoun trade capsule.</p>
              </div>
            </div>

          </div>

        </div>

      </div>

    </section> --}}<!-- #features -->

    <!--==========================
      Product Advanced Featuress Section
    ============================-->
    {{-- <section id="advanced-features">

      <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right" src="{{ asset('avilon/img/advanced-feature-1.jpg') }}" alt="" data-aos="fade-left">
              <div data-aos="fade-right">
                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-left" src="{{ asset('avilon/img/advanced-feature-2.jpg') }}" alt="">
              <div data-aos="fade-left">
                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                <i class="ion-ios-paper-outline" data-aos="fade-left"></i>
                <p data-aos="fade-left">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</p>
                <i class="ion-ios-color-filter-outline" data-aos="fade-left" data-aos-delay="200"></i>
                <p data-aos="fade-left" data-aos-delay="200">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
                <i class="ion-ios-barcode-outline" data-aos="fade-left" data-aos-delay="400"></i>
                <p data-aos="fade-left" data-aos-delay="400">Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="features-row section-bg">
        <div class="container">
          <div class="row">
            <div class="col-12">
              <img class="advanced-feature-img-right" src="{{ asset('avilon/img/advanced-feature-3.jpg') }}" alt="" data-aos="fade-left">
              <div data-aos="fade-right">
                <h2>Duis aute irure dolor in reprehenderit in voluptate velit esse</h2>
                <h3>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</h3>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam</p>
                <i class="ion-ios-albums-outline"></i>
                <p>Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section> --}}<!-- #advanced-features -->

    <!--==========================
      Call To Action Section
    ============================-->
    {{-- <section id="call-to-action">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section> --}}<!-- #call-to-action -->

    <!--==========================
      More Features Section
    ============================-->
    {{-- <section id="more-features" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">More Features</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-6">
            <div class="box" data-aos="fade-right">
              <div class="icon"><i class="ion-ios-stopwatch-outline"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box" data-aos="fade-left">
              <div class="icon"><i class="ion-ios-bookmarks-outline"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box" data-aos="fade-right">
              <div class="icon"><i class="ion-ios-heart-outline"></i></div>
              <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
          </div>

          <div class="col-lg-6">
            <div class="box" data-aos="fade-left">
              <div class="icon"><i class="ion-ios-analytics-outline"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>

        </div>
      </div>
    </section> --}}<!-- #more-features -->

    <!--==========================
      Clients
    ============================-->
    {{-- <section id="clients">
      <div class="container">

        <div class="row">

          <div class="col-md-2">
            <img src="{{ asset('avilon/img/clients/client-1.png') }}" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="{{ asset('avilon/img/clients/client-2.png') }}" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="{{ asset('avilon/img/clients/client-3.png') }}" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="{{ asset('avilon/img/clients/client-4.png') }}" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="{{ asset('avilon/img/clients/client-5.png') }}" alt=""  data-aos="fade-up">
          </div>

          <div class="col-md-2">
            <img src="{{ asset('avilon/img/clients/client-6.png') }}" alt=""  data-aos="fade-up">
          </div>

        </div>
      </div>
    </section> --}}<!-- #more-features -->

    <!--==========================
      Pricing Section
    ============================-->
    {{-- <section id="pricing" class="section-bg">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Pricing</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-right">
              <h3>Free</h3>
              <h4><sup>$</sup>0<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box featured" data-aos="fade-up">
              <h3>Business</h3>
              <h4><sup>$</sup>29<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="box" data-aos="fade-left">
              <h3>Developer</h3>
              <h4><sup>$</sup>49<span> month</span></h4>
              <ul>
                <li><i class="ion-android-checkmark-circle"></i> Quam adipiscing vitae proin</li>
                <li><i class="ion-android-checkmark-circle"></i> Nec feugiat nisl pretium</li>
                <li><i class="ion-android-checkmark-circle"></i> Nulla at volutpat diam uteera</li>
                <li><i class="ion-android-checkmark-circle"></i> Pharetra massa massa ultricies</li>
                <li><i class="ion-android-checkmark-circle"></i> Massa ultricies mi quis hendrerit</li>
              </ul>
              <a href="#" class="get-started-btn">Get Started</a>
            </div>
          </div>

        </div>
      </div>
    </section> --}}<!-- #pricing -->


    <!--==========================
      Frequently Asked Questions Section
    ============================-->
    {{-- <section id="faq">
      <div class="container">

        <div class="section-header">
          <h3 class="section-title">Frequently Asked Questions</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>

        <ul id="faq-list" data-aos="fade-up">
          <li>
            <a data-toggle="collapse" class="collapsed" href="#faq1">Non consectetur a erat nam at lectus urna duis? <i class="ion-android-remove"></i></a>
            <div id="faq1" class="collapse" data-parent="#faq-list">
              <p>
                Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq2" class="collapsed">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? <i class="ion-android-remove"></i></a>
            <div id="faq2" class="collapse" data-parent="#faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq3" class="collapsed">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? <i class="ion-android-remove"></i></a>
            <div id="faq3" class="collapse" data-parent="#faq-list">
              <p>
                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq4" class="collapsed">Ac odio tempor orci dapibus. Aliquam eleifend mi in nulla? <i class="ion-android-remove"></i></a>
            <div id="faq4" class="collapse" data-parent="#faq-list">
              <p>
                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq5" class="collapsed">Tempus quam pellentesque nec nam aliquam sem et tortor consequat? <i class="ion-android-remove"></i></a>
            <div id="faq5" class="collapse" data-parent="#faq-list">
              <p>
                Molestie a iaculis at erat pellentesque adipiscing commodo. Dignissim suspendisse in est ante in. Nunc vel risus commodo viverra maecenas accumsan. Sit amet nisl suscipit adipiscing bibendum est. Purus gravida quis blandit turpis cursus in
              </p>
            </div>
          </li>

          <li>
            <a data-toggle="collapse" href="#faq6" class="collapsed">Tortor vitae purus faucibus ornare. Varius vel pharetra vel turpis nunc eget lorem dolor? <i class="ion-android-remove"></i></a>
            <div id="faq6" class="collapse" data-parent="#faq-list">
              <p>
                Laoreet sit amet cursus sit amet dictum sit amet justo. Mauris vitae ultricies leo integer malesuada nunc vel. Tincidunt eget nullam non nisi est sit amet. Turpis nunc eget lorem dolor sed. Ut venenatis tellus in metus vulputate eu scelerisque. Pellentesque diam volutpat commodo sed egestas egestas fringilla phasellus faucibus. Nibh tellus molestie nunc non blandit massa enim nec.
              </p>
            </div>
          </li>

        </ul>

      </div>
    </section> --}}<!-- #faq -->

    <!--==========================
      Our Team Section
    ============================-->
    <section id="team" class="section-bg">
      <div class="container">
        <div class="section-header">
          <h3 class="section-title">Equipo</h3>
          <span class="section-divider"></span>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row" data-aos="fade-up">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('avilon/img/team/team-1.jpg') }}" alt=""></div>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('avilon/img/team/team-2.jpg') }}" alt=""></div>
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('avilon/img/team/team-3.jpg') }}" alt=""></div>
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="{{ asset('avilon/img/team/team-4.jpg') }}" alt=""></div>
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery">
      <div class="container-fluid">
        <div class="section-header">
          <h3 class="section-title">Productos</h3>
          <span class="section-divider"></span>
          @if(Auth::guest())
          <p class="section-description">Para ver los detalles de nuestros productos y comenzar tu compra <a href="{{ route('register') }}">Regístrate</a></p>
          @else
          <p class="section-description">Para ver los detalles de nuestros productos y comenzar tu compra ve a <a href="{{ route('ventas.index') }}">La Tiendita</a></p>
          @endif
        </div>

        <div class="row no-gutters">
          @foreach($productos as $key)
            @foreach($key->imagenes as $key2)
              @if($key2->pivot->mostrar=="Si" and $j<6)

                <div class="col-lg-4 col-md-6">
                  <div class="gallery-item" data-aos="fade-up">
                    @if(Auth::guest())
                      {{-- no esta logueado --}}                 
                    <a href="{{ asset($key2->url) }}" class="gallery-popup">
                      <img src="{{ asset($key2->url) }}" alt="">
                    </a>
                    @else
                      <a href="{{ asset($key2->url) }}" class="gallery-popup">
                      <img src="{{ asset($key2->url) }}" alt="">
                    </a>
                    @endif
                  </div>
                </div>
                @php $j++; @endphp
              @endif
            @endforeach
          @endforeach
          {{-- <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="{{ asset('img_productos/3.PNG') }}" class="gallery-popup">
                <img src="{{ asset('img_productos/3.PNG') }}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="{{ asset('img_productos/5.PNG') }}" class="gallery-popup">
                <img src="{{ asset('img_productos/5.PNG') }}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="{{ asset('img_productos/7.PNG') }}" class="gallery-popup">
                <img src="{{ asset('img_productos/7.PNG') }}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="{{ asset('img_productos/10.PNG') }}" class="gallery-popup">
                <img src="{{ asset('img_productos/10.PNG') }}" alt="">
              </a>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="gallery-item" data-aos="fade-up">
              <a href="{{ asset('img_productos/12.PNG') }}" class="gallery-popup">
                <img src="{{ asset('img_productos/12.PNG') }}" alt="">
              </a>
            </div>
          </div> --}}

        </div>

      </div>
    </section><!-- #gallery -->

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container">
        <div class="row" data-aos="fade-up">

          <div class="col-lg-4 col-md-4">
            <div class="contact-about">
              <h3>My Little Shop</h3>
              <p>Cras fermentum odio eu feugiat. Justo eget magna fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
              <div class="social-links">
                <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
          Nosotros href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="info">
              <div>
                <i class="ion-ios-location-outline"></i>
                <p>A108 Adam Street<br>New York, NY 535022</p>
              </div>

              <div>
                <i class="ion-ios-email-outline"></i>
                <p>info@example.com</p>
              </div>

              <div>
                <i class="ion-ios-telephone-outline"></i>
                <p>+1 5589 55488 55s</p>
              </div>

            </div>
          </div>

          <div class="col-lg-5 col-md-8">
            <div class="form">
              <div id="sendmessage">Your message has been sent. Thank you!</div>
              <div id="errormessage"></div>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-row">
                  <div class="form-group col-lg-6">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validation"></div>
                  </div>
                  <div class="form-group col-lg-6">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validation"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>
                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #contact -->

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
            <a href="#Nosotroslass" class="scrollto">About</a>
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
  <script src="{{ asset('avilon/js/main.js') }}"></script>

</body>
</html>
