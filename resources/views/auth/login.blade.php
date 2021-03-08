<!DOCTYPE html>
<html>
<head>
    <title>Mi Cuenta</title>
    <!-- Site favicon -->
    <link rel="shortcut icon" href="{{ asset('logo.png') }}">
    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700" rel="stylesheet">
    <!-- Icon Font -->
    <link rel="stylesheet" href="{{ asset('acceder/fonts/ionicons/css/ionicons.css') }}">
    <!-- Text Font -->
    <link rel="stylesheet" href="{{ asset('acceder/fonts/font.css') }}">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('acceder/css/bootstrap.css') }}">
    <!-- Normal style CSS -->
    <link rel="stylesheet" href="{{ asset('acceder/css/style.css') }}">
    <!-- Normal media CSS -->
    <link rel="stylesheet" href="{{ asset('acceder/css/media.css') }}">
</head>
<body>

    <!-- Header start -->
    <div class="header-wrap">
        <div class="clearfix">
            <div class="logo">
                <a href="{{ url('/') }}"><img src="{{ asset('logo.png') }}" style="width: 20% !important" alt=""><font size="7">My Little Shop</font></a>
            </div>
            
        </div>
    </div>
    <!-- Header end -->
    <main class="cd-main">
        <section class="cd-section index7 visible">
            <div class="cd-content style7">
                <div class="login-box">
                    <div class="login-form-slider">
                        <!-- login slide start -->
                        <div class="login-slide slide">
                            <div class="login-header">
                                <div class="sign-up-txt text-right">
                                    ¿No tienes una cuenta? <a href="javascript:;" class="sign-up-click">Registrarse</a>
                                </div>
                            </div>
                            <form  class="padding-40px" method="POST" action="{{ route('login') }}">
                                @csrf
                                <div class="form-group user-name-field">
                                    <input type="text"placeholder="Nombre de Usuario" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                    <div class="field-icon"><i class="ion-person"></i></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group margin-bottom-30px forgot-password-field">
                                    <input type="password" placeholder="Contraseña" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                    <div class="field-icon"><i class="ion-locked"></i></div>
                                    <a href="javascript:;" class="forgot-password-click">Olvidó?</a>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                                <div class="form-group sign-in-btn">
                                    <input type="submit" class="submit" value="Acceder">
                                </div>
                            </form>
                        </div>
                        <!-- login slide end -->
                        <!-- signup slide start -->
                        <div class="signup-slide slide">
                            <div class="login-header">
                                <div class="sign-up-txt text-right">
                                    ¿Si ya tienes una cuenta? <a href="javascript:;" class="login-click">Acceder</a>
                                </div>
                            </div>
                            <form class="padding-40px" method="POST" action="{{ route('register') }}">
                                @csrf
                                <div class="form-group user-name-field">
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nombre">
                                    <div class="field-icon"><i class="ion-person"></i></div>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group user-name-field">
                                    <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Correo">
                                    <div class="field-icon"><i class="ion-ios-email"></i></div>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Contraseña">
                                    <div class="field-icon"><i class="ion-locked"></i></div>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group margin-bottom-30px">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="Confirme contraseña">
                                    <div class="field-icon"><i class="ion-locked"></i></div>
                                </div>
                                <div class="form-group sign-in-btn">
                                    <input type="submit" class="submit" value="Registrarse">
                                </div>
                            </form>
                        </div>
                        <!-- signup slide end -->
                        <!-- forgot password slide start -->
                        <div class="forgot-password-slide slide">
                            <div class="login-header">
                                <div class="sign-up-txt text-right">
                                    ¿Quieres recordar tu contraseña? <a href="javascript:;" class="login-click">Acceder</a>
                                </div>
                            </div>
                            <form class="padding-40px">
                                <label class="label">Ingresa tu correo para cambiar la contraseña</label>
                                <div class="form-group user-name-field">
                                    <input type="text" class="form-control" placeholder="Email">
                                    <div class="field-icon"><i class="ion-ios-email"></i></div>
                                </div>
                                <div class="form-group sign-in-btn">
                                    <input type="submit" class="submit" value="Submit">
                                </div>
                            </form>
                        </div>
                        <!-- forgot password slide end -->
                    </div>
                </div>
            </div>
        </section>
    </main>
    <div id="cd-loading-bar" data-scale="1"></div>
    <!-- JS File -->
    <script src="{{ asset('acceder/js/modernizr.js') }}"></script>
    <script type="text/javascript" src="{{ asset('acceder/js/jquery.js') }}"></script>
    <script type="text/javascript" src="{{ asset('acceder/js/popper.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('acceder/js/bootstrap.js') }}"></script>
    <script src="{{ asset('acceder/js/velocity.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('acceder/js/script.js') }}"></script>
</body>
</html>