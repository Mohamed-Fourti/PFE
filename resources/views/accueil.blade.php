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
                    @if($formEtevens->isEmpty())


            
<div>pas de Évènements-Formation</div>




@else
                    @foreach($formEtevens as $formEteven )

                        <li>
                            <div class="singel-event">
                                <span><i class="fa fa-calendar"></i>{{ $formEteven->created_at }}</span>
                                <a href="{{ route('Publication/.display', [$formEteven->slug, 'ca' => $formEteven->categories_id ] )  }}">
                                    <h4>{{ $formEteven->title }}</h4>
                                </a>
                                <span><i class="fa fa-clock-o"></i> 10:00 Am - 3:00 Pm</span>
                                <span><i class="fa fa-map-marker"></i> Rc Auditorim</span>
                            </div>
                        </li>
                    
                        @endforeach
                        @endif

                    </ul>
                    <a href="{{ route('Publications') }}" class="main-btn mt-55">Voir tout</a>
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
            @if($nouveautélasts->isEmpty())


            
            <div>no news</div>

   
   
    
  @else
@foreach($nouveautélasts->where('categories_id',3) as $nouveautélast)

                <div class="singel-news mt-30">
                    <div class="news-thum pb-25">
                    <a href="{{ route('Publication/.display', [$nouveautélast->slug, 'ca' => $nouveautélast->categories_id ] )  }}">
                    <img src="{{ getImage($nouveautélast, false) }}" alt="" style="width:100%"></a>
                    </div>
                    
                    <div class="news-cont">
                        <ul>
                            <li><a><i class="fa fa-calendar"></i>{{ $nouveautélast->created_at }}</a></li>
                            <li><span>By</span>{{ $nouveautélast->user->nom }}</li>
                        </ul>
                        <a href="{{ route('Publication/.display', $nouveautélast->slug) }}">
                            <h3>{{ $nouveautélast->title }}</h3>
                        </a>
                        <p>{{ $nouveautélast->excerpt }}</p>
                    </div>
                </div> <!-- singel news -->
                @endforeach 
                 
 @endif
            </div>
 <div class="singel-news news-list">
 @if($nouveautés->isEmpty())

 <div class="row">
 <div class="col-sm-4">

            
<div>pas de nouvelles</div>

</div>
</div>


@else
                @foreach($nouveautés->where('categories_id',3) as $nouveauté )
                                 <div class="row">

                        <div class="col-sm-4">
                
                            <div class="news-thum mt-30">
                            <a href="{{ route('Publication/.display', [$nouveauté->slug, 'ca' => $nouveauté->categories_id ] )  }}">

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
                            <a href="{{ route('Publication/.display', $nouveauté->slug) }}">
                                    <h3>{{ $nouveauté->title }}</h3></a>
                                </a>
                                <p>{{ $nouveauté->excerpt }}</p>
                            </div>
                        </div>
                    </div> <!-- row -->
                @endforeach  
                @endif
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