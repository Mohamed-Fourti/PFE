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

<section id="about-part">
    <div class="container">
        <div class="row">
            <div class="col-lg-7">
                <div class="about-cont">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="../images/accueil/ti.jpg" class="d-block" alt="image1" style="max-width:100%;height:600px ;">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/accueil/banner.jpg" class="d-block" alt="image2" style="max-width:100%;height:600px;">
                            </div>
                            <div class="carousel-item">
                                <img src="../images/accueil/pc.jpg" class="d-block" alt="image3" style="max-width:100%;height:600px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-5">
                <div class="about-event mt-50">
                    <div class="event-title">
                        <h3>Évènements et Formations</h3>
                    </div>
                    <ul>
                        @if($formEtevens==null)
                        <div>
                            <h4>Pas des évènements et formations</h4>
                        </div>
                        @else
                        @foreach($formEtevens as $formEteven )

                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i>{{ $formEteven->created_at }}</span>
                                <a href="{{ route('Publication/show', [$formEteven->slug, 'ca' => $formEteven->categories_id ] )  }}">
                                    <h4>{{ $formEteven->title }}</h4>
                                </a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>

                        @endforeach
                        @endif

                    </ul>
                    <a href="{{ route('Publications') }}" class="main-btn mt-45">Voir tout</a>
                </div> <!-- about event -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

<!--chekbox
<div class="checkbox">
    <label style="font-size: 2.5em">
        <input type="checkbox" value="" id="inputChek">
        <span class="cr"><i class="cr-icon fa fa-check" id="chekIcon"></i></span>
    </label>
</div>
Endchekbox-->

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
            @if($nouveautélasts!=null)

            @foreach($nouveautélasts as $nouveautélast)
            <div class="col-lg-6">

                <div class="singel-news mt-30">
                    <div class="news-thum pb-25">
                        <a href="{{ route('Publication/show', [$nouveautélast->slug, 'ca' => $nouveautélast->categories_id ] )  }}">
                            <img src="{{ getImage($nouveautélast, false) }}" alt="" style="width:100%"></a>
                    </div>

                    <div class="news-cont">
                        <ul>
                            <li><a><i class="fa fa-calendar"></i>{{ $nouveautélast->created_at }}</a></li>
                            <li><span>By</span>{{ $nouveautélast->user->nom }}</li>
                        </ul>
                        <a href="{{ route('Publication/show', [$nouveautélast->slug, 'ca' => $nouveautélast->categories_id ] )  }}">
                            <h3>{{ $nouveautélast->title }}</h3>
                        </a>
                        <p>{{ $nouveautélast->excerpt }}</p>
                    </div>
                </div> <!-- singel news -->
            </div> <!-- singel news -->

            @endforeach
            @endif

            @if($nouveautés!=null)

            @foreach($nouveautés as $nouveauté )
            <div class="col-lg-6">

                <div class="singel-news news-list">

                    <div class="row">

                        <div class="col-sm-4">

                            <div class="news-thum mt-30">
                                <a href="{{ route('Publication/show', [$nouveauté->slug, 'ca' => $nouveauté->categories_id ] )  }}">

                                    <img src="{{ getImage($nouveauté, true) }}" alt="" style="width:100%"></a>
                            </div>
                        </div>
                        <div class="col-sm-8">
                            <div class="news-cont mt-30">
                                <ul>
                                    <li><a><i class="fa fa-calendar"></i>{{ $nouveauté->created_at }} </a></li>
                                    <li><span>By </span>{{ $nouveauté->user->nom }}</li>
                                </ul>
                                <a>
                                    <a href="{{ route('Publication/show', $nouveauté->slug) }}">
                                        <h3>{{ $nouveauté->title }}</h3>
                                    </a>
                                </a>
                                <p>{{ $nouveauté->excerpt }}</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                </div> <!-- singel news -->

                @endforeach
                @endif

            </div>
        </div> <!-- row -->
</section>

<!--====== NEWS PART ENDS ======-->


<!--====== VIDEO FEATURE PART START ======-->

<section class="bg_cover pt-60 pb-110" style="background-image: url(../images/accimg.jpg)">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-last order-lg-first">
                <div class="video text-lg-left text-center pt-50">
                </div> <!-- row -->
            </div>
            <div class="col-lg-5 offset-lg-1 order-first order-lg-last">
                <div class="feature pt-50">
                    <div class="feature-title">
                        <h3 id="featureId">Notre site Web</h3>
                    </div>
                    <ul>
                        <li>
                            <div class="singel-feature">
                                <span class="icon">
                                    <img src="images/all-icon/f-1.png" alt="icon">
                                </span>
                                <span class="cont">
                                    <h4 id="featureId">Emplois du temps en ligne</h4>
                                </span>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature" id="singelId">
                                <span class="icon">
                                    <img src="images/all-icon/f-2.png" alt="icon">
                                </span>
                                <span class="cont">
                                    <h4 id="featureId">Supports de cours</h4>
                                </span>
                            </div> <!-- singel feature -->
                        </li>
                        <li>
                            <div class="singel-feature">
                                <span class="icon">
                                    <img src="images/all-icon/f-3.png" alt="icon">
                                </span>
                                <span class="cont">
                                    <h4 id="featureId">Inscription en Évènement</h4>
                                </span>
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