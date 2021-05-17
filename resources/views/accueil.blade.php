@extends('layouts.app')

@section('content')

<!--====== HEADER PART START ======-->



<!--====== HEADER PART ENDS ======-->

<!--====== SEARCH BOX PART START ======-->

<div class="search-box">
    <div class="serach-form">
        <div class="closebtn">
            <span></span>
            <span></span>
        </div>
        <form action="#">
            <input type="text" placeholder="Search by keyword">
            <button><i class="fa fa-search"></i></button>
        </form>
    </div> <!-- serach form -->
</div>

<!--====== SEARCH BOX PART ENDS ======-->




<!--====== ABOUT PART START ======-->

<section id="about-part  ">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="section-title mt-50">
                    <h3>Bienvenue à l'ISET de djerba </h3>
                </div>
                <div class="about-cont">
                    <p>L'ISET de Djerba, créé en 2000, fait partie d'un réseau de 25 instituts supérieurs des études technologiques. Il assure, dans le cadre du LMD, une formation supérieure technologique dans les spécialités : Génie électrique, Génie mécanique, Sciences Economique et Gestion, Technologies de l'Informatique.

                        Au terme de trois ans d'études, les étudiants obtiennent le diplôme national de la Licence Appliquée.
                        En partenariat avec le milieu économique, l'ISET de Djerba assure des formations co-construites en Mécatronique Automobile et en Développement et Référencement des sites Web, couronnées par l'obtention de la Licence appliquée. De même, l'ISET de Djerba propose, depuis 2013, le programme de Mastère Professionnel en Hôtellerie et Tourisme.
                </div>
            </div>
            <div class="col-lg-6 offset-lg-1">
                <div class="about-event mt-50">
                    <div class="event-title">
                        <h3>Évènements-Formation à venir</h3>
                    </div>
                    <ul>
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i> 2 December 2021</span>
                                <a href="{{ url('Évènement') }}">
                                    <h4>Évènement1</h4>
                                </a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i> 2 December 2021</span>
                                <a href="{{ url('Formation') }}">
                                    <h4>Formation1</h4>
                                </a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>
                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i> 2 December 2021</span>
                                <a href="events-singel.html">
                                    <h4>Évènement3</h4>
                                </a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>
                    </ul>
                    <a href="#" class="main-btn mt-55">Voir tout</a>
                </div> <!-- about event -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <div class="about-bg">
    </div>
</section>

<!--====== ABOUT PART ENDS ======-->
<!--====== NEWS PART START ======-->

<section id="news-part" class="pt-115 pb-110 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="section-title pb-50">
                    <h5>NOUVEAUTÉS</h5>
                </div> <!-- section title -->
            </div>
        </div> <!-- row -->
        <div class="row">
            <div class="col-lg-6">
                <div class="singel-news mt-30">
                    <div class="news-thum pb-25">
                        <img src="images/news/n-1.jpg" alt="News">
                    </div>
                    <div class="news-cont">
                        <ul>
                            <li><i class="fa fa-calendar"></i>2 December 2018 </li>
                            <li><span>By</span> Adam linn</li>
                        </ul>
                        <a href="{{ url('Nouveauté') }}">
                            <h3>Tips to grade high cgpa in university life</h3>
                        </a>
                        <p>Lorem ipsum gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons equat ipsutis sem nibh id elit. Duis sed odio sit amet nibh vulputate cursus a sit amet mauris. Morbi accumsan ipsum velit. Nam nec tellus a odio tincidunt .</p>
                    </div>
                </div> <!-- singel news -->
            </div>
            <div class="col-lg-6">
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="images/news/ns-1.jpg" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                    <li><a href="#"> <span>By</span> Adam linn</a></li>
                                </ul>
                                <a href="{{ url('Nouveauté') }}">
                                    <h3>Intellectual communication</h3>
                                </a>
                                <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons vel.</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- singel news -->
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="images/news/ns-2.jpg" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                    <li><a href="#"> <span>By</span> Adam linn</a></li>
                                </ul>
                                <a href="blog-singel.html">
                                    <h3>Study makes you perfect</h3>
                                </a>
                                <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons vel.</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- singel news -->
                <div class="singel-news news-list">
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="news-thum mt-30">
                                <img src="images/news/ns-3.jpg" alt="News">
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a href="#"><i class="fa fa-calendar"></i>2 December 2018 </a></li>
                                    <li><a href="#"> <span>By</span> Adam linn</a></li>
                                </ul>
                                <a href="blog-singel.html">
                                    <h3>Technology edcution is now....</h3>
                                </a>
                                <p>Gravida nibh vel velit auctor aliquetn sollicitudirem quibibendum auci elit cons vel.</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- singel news -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--====== NEWS PART ENDS ======-->


<!--====== VIDEO FEATURE PART START ======-->

<section class="bg_cover pt-60 pb-110" style="background-image: url(images/bg-1.jpg)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
                <div class="video text-lg-left text-center pt-50">
                </div> <!-- row -->
            </div>
            <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                <div class="feature pt-50">
                    <div class="feature-title">
                        <h3>Notre site Web</h3>
                    </div>
                    <ul>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="images/all-icon/f-1.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Emplois du temps en ligne</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="images/all-icon/f-2.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Supports de cours</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <div class="icon">
                                    <img src="images/all-icon/f-3.png" alt="icon">
                                </div>
                                <div class="cont">
                                    <h4>Inscription en Évènement</h4>
                                    <p>Gravida nibh vel velit auctor aliquetn auci elit cons solliazcitudirem sem quibibendum sem nibhutis.</p>
                                </div>
                            </div> <!-- singel feature -->
                        </li>
                    </ul>
                </div> <!-- feature -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
    <!-- <div class="feature-bg"></div>feature bg -->
</section>

<!--====== VIDEO FEATURE PART ENDS ======-->




@endsection