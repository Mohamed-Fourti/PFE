<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <!--====== Required meta tags ======-->
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--====== Title ======-->
    <title>IsetJb</title>

    <!--====== Favicon Icon ======-->
    <link rel="shortcut icon" href="{{ asset('images/LOGO.png') }}" type="image/png">



    <!--====== Fontawesome css ======-->
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">

    <!--====== Default css ======-->
    <link href="{{ asset('css/default.css') }}" rel="stylesheet">

    <!--====== Style css ======-->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!--====== Responsive css ======-->
    <link href="{{ asset('css/responsive.css') }}" rel="stylesheet">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<!------ Include the above in your HEAD tag ---------->

<section class="login-block">
  <div class="container"  id="Conth">
      <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Connecter</h2>
            <form class="login-form" method="POST" action="{{ route('loginAdmin') }}">
            @csrf

              <div class="form-group">

                <input id="inputType" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="Adresse E-mail">

                 @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                 @enderror
              </div>

              <div class="form-group">
                <input id="inputType" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Mot de passe">

                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
              </div>
      
              <div class="form-check">
                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                  <label class="form-check-label" for="remember">
                      {{ __('Se rappeler de moi') }}
                  </label>
              </div>
              <br><br>
              <div>
                <input type="submit" class=" logbtn" value=" {{ __('Connexion') }}">
              </div>
      
            </form> 

            <div class="copy-text">ISET Djerba.</a></div>
            </div>

            <div class="col-md-8 banner-sec">
              <div class="">
                <img class="d-block img-fluid" src="../../images/accueil/info.jpg" alt="Image" id="Img">
              </div> 	    
            </div>
        </div>
      </div>
  </div>
</section>