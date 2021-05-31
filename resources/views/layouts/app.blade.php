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
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>

    <!--====== PRELOADER PART START ======-->
    <!--
    <div class="preloader">
        <div class="loader rubix-cube">
            <div class="layer layer-1"></div>
            <div class="layer layer-2"></div>
            <div class="layer layer-3 color-1"></div>
            <div class="layer layer-4"></div>
            <div class="layer layer-5"></div>
            <div class="layer layer-6"></div>
            <div class="layer layer-7"></div>
            <div class="layer layer-8"></div>
        </div>
    </div>-->
    <div class="header-top pt-15 pb-15">
        <div class="container">
            <div class="row ">
                <div class="col-lg-12 col-md-12 d-flex flex-row">
                    <div class="pr-2">

                        <img src="{{ asset('images/flag.png') }}" alt="Logo">

                    </div>
                    <div id="ministry_logo">République Tunisienne 
                        <br>Ministère de l’Enseignement Supérieur et de la Recherche Scientifique
                        <br>Direction générale des études technologiques
                    </div>
                </div> 
            </div> <!-- row -->
        </div> <!-- container -->
    </div><!-- header logo support -->
    <header id="header-part">
        <div class="navigation">
            <div class="container">
                <div class="row" id="rowPading">
                    <div class="col-lg-8 col-md-8 col-sm-7 col-6">

                        <nav class="navbar navbar-expand-lg">
                            <div class="logo pr-5 pt-2">
                                <a href="{{ url('/') }}">
                                    <img src="{{ asset('images/logo.png') }}" alt="Logo">
                                </a>
                            </div>

                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <li class="nav-item">
                                        <a href="{{ url('/') }}">Accueil</a>
                                    </li>

                                    <li class="nav-item ">
                                        <a>Publication</a>
                                        <ul class="sub-menu">
                                            <li><a href="{{ url('Nouveautés')}}">Nouveautés</a></li>
                                            <li><a href="{{ url('Évènements') }}">Évènements</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item col-3 ">
                                        <a>Liens utiles</a>
                                        <ul class="sub-menu">
                                            <li><a href="">Emplois du temps</a></li>
                                            <li><a href="">Supports de cours</a></li>
                                        </ul>
                                    </li>
                                    <li class="nav-item ">
                                        @role('admin')
                                            <a href="{{ url('admin') }}">Administration</a>
                                        @endrole
                                        @role('Techniciens')
                                            <a href="{{ url('réclamations') }}">Réclamation</a>
                                        @endrole
                                        @role('Enseignants')
                                        <a href="{{ url('réclamation') }}">Réclamation</a>
                                            <a href="{{ url('réclamation') }}">Creér un ticket</a>
                                            @if($FichedevœuxOF !=null)
                                            @if($FichedevœuxOF->sem=='S1')
                                            <a href="{{ url('Fiche-De-Vœux',$FichedevœuxOF->sem) }}">Remplir fiche de vœux S1</a>
                                            @else
                                            <a href="{{ url('Fiche-De-Vœux',$FichedevœuxOF->sem) }}">Remplir fiche de vœux S2</a>
                                            @endif
                                            @else 

                                            @endif                                  
                                                  @endrole
                                    </li>
                                    <li class="nav-item ">
                                        <a href="{{ url('contact') }}">Contact</a>
                                    </li>
                                </ul>
                            </div>
                        </nav> <!-- nav -->
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-4 col-5" id="rightNav">
                        <div class="right-icon text-right ">

                            <ul>
                                <li><a href="#" id="search"><i class="fa fa-search"></i></a></li>
                                @guest
                                @if (Route::has('login'))
                                <li>
                                    <a class="nav-link" href="{{ route('login') }}">Connexion</a>
                                </li>
                                @endif

                                @if (Route::has('register'))
                                <li>
                                    <a class="nav-link" href="{{ route('register') }}">S'inscrire</a>
                                </li>
                                @endif
                                @else
                                <li>

                                    <div class="action act">
                                        <div class="profile" onclick="menuToggle();"><img src="{{ asset('images/profile_img.png') }}"></div>
                                        <div class="menu">
                                            <h3>{{ Auth::user()->nom }}<br><span>{{ Auth::user()->role }}</span></h3>
                                            <ul>
                                                <li><img src="{{ asset('images/618631.svg') }}"><a href="#">Profile</a></li>
                                                <li><img src="{{ asset('images/1250678.svg') }}"><a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                        {{ __('Déconnexion') }}
                                                    </a></li>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                    @csrf
                                                </form>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                            @endguest
                            
                           

                        </div> <!-- right icon -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div>

    </header>

    @yield('content')


    <!--====== FOOTER PART START ======-->

    <footer id="footer-part">
        <div class="footer-top pt-40 pb-70">
            <div class="container">
                <div class="row">
                    <!--<div class="col-lg-4 col-md-6">
                        <div class="footer-about mt-40">
                            <div class="logo">
                                <a href="#"><img src="{{ asset('images/logo.png') }}" alt="Logo"></a>
                            </div>
                            <ul class="mt-20">
                                <li><a href="https://www.facebook.com/djerba.iset"><i class="fab fa-facebook-f"></i></a></li>
                            </ul>
                        </div> 
                    </div>--><!-- footer about -->
                    <div class="col-sm">
                        <div class="footer-link mt-40">
                            <div class="footer-title pb-25">
                                <h6>Navigation</h6>
                            </div>
                            <ul>
                                <li><a href="{{ url('/') }}"><i class="fa fa-angle-right"></i>Accueil</a></li>
                                <li><a href="courses.html"><i class="fa fa-angle-right"></i>Évènements</a></li>
                                <li><a href="blog.html"><i class="fa fa-angle-right"></i>Formation</a></li>
                                <li><a href="events.html"><i class="fa fa-angle-right"></i>Nouveautés</a></li>
                            </ul>
                        </div> <!-- footer link -->
                    </div>
                    <div class="col-sm">
                        <div class="footer-link support mt-40">
                            <div class="footer-title pb-25">
                                <h6>Service en ligne</h6>
                            </div>
                            <ul>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Cours en ligne</a></li>
                                <li><a href="#"><i class="fa fa-angle-right"></i>Emploi de temps en ligne</a></li>

                            </ul>
                        </div> <!-- support -->
                    </div>
                    <div class="col-sm">
                        <div class="footer-address mt-40">
                            <div class="footer-title pb-25">
                                <h6>Contactez nous</h6>
                            </div>
                            <ul>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-home"></i>
                                    </div>
                                    <div class="cont">
                                        <p>Avenue de la Liberté, Route Houmet Souk - Midoun 4116 Midoun - Djerba (Tunisie)</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="cont">
                                        <p>75 733 109 - 75 733 110</p>
                                    </div>
                                </li>
                                <li>
                                    <div class="icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    <div class="cont">
                                        <p>isetjb@gmail.com</p>
                                    </div>
                                </li>
                            </ul>
                        </div> <!-- footer address -->
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer top -->

        <div class="footer-copyright pt-10 pb-25">
            <div class="container">
                <div class="row">
                    <div class="col-md-8">
                        <div class="copyright text-md-left text-center pt-15">
                            <p>&copy; 2021 ISET de Djerba Tous droits réservés</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="copyright text-md-right text-center pt-15">

                        </div>
                    </div>
                </div> <!-- row -->
            </div> <!-- container -->
        </div> <!-- footer copyright -->
    </footer>

    <!--====== FOOTER PART ENDS ======-->

    <!--====== BACK TO TP PART START ======-->

    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    <!--====== Counter Up js ======-->

    <script src="{{ asset('js/jquery.counterup.min.js') }}" defer></script>


    <!--====== Count Down js ======-->
    <script src="{{ asset('js/jquery.countdown.min.js') }}" defer></script>
    <script src="{{ asset('js/jquery.jscroll.min.js') }}" defer></script>


    <!--====== Main js ======-->
    <script src="{{ asset('js/main.js') }}" defer></script>


    <!--====== Map js ======-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDC3Ip9iVC0nIxC6V14CKLQ1HZNF_65qEQ"></script>
    <script src="js/map-script.js"></script>
    <script>
        function menuToggle() {
            const toggleMenu = document.querySelector('.menu');
            toggleMenu.classList.toggle('active')
        }
        
        
    </script>

    @stack('scripts')
</body>

</html>