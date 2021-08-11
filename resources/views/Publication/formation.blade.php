@extends('layouts.app')

@section('content')

<section id="corses-singel" class="pt-100 pb-100  gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="corses-singel-left mt-30">
                    <div class="title">
                        <span class="mr-3">
                            <h3>{{ $Publication->title }}</h3>
                        </span>
                        <span><i class="fa fa-calendar"></i> {{ $Publication->created_at }}</span>
                    </div> <!-- title -->
                    <div class="corses-singel-image pt-50">
                        <img src="{{ getImage($Publication) }}" alt="Courses">
                    </div> <!-- corses singel image -->

                    <div class="corses-tab mt-30">
                        <ul class="nav nav-justified" id="myTab" role="tablist">
                            <li class="nav-item">
                                <a class="active" id="overview-tab" data-toggle="tab" href="#overview" role="tab" aria-controls="overview" aria-selected="true">Aperçu</a>
                            </li>
                            <li class="nav-item">
                                <a id="instructor-tab" data-toggle="tab" href="#instructor" role="tab" aria-controls="instructor" aria-selected="false">Formateur</a>
                            </li>
                        </ul>

                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="overview" role="tabpanel" aria-labelledby="overview-tab">
                                <div class="overview-description">
                                    <div class="singel-description pt-40">
                                        <h6>Résumé du cours</h6>
                                        {!! $Publication->body !!}
                                    </div>

                                </div> <!-- overview description -->
                            </div>

                            <div class="tab-pane fade" id="instructor" role="tabpanel" aria-labelledby="instructor-tab">
                                <div class="instructor-cont">
                                    <div class="instructor-author">
                                        <div class="author-thum">
                                        </div>
                                        <div class="author-name">
                                            <a href="#">
                                                <h5>{{ $Publication->formateur }}</h5>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="instructor-description pt-25">
                                    </div>
                                </div> <!-- instructor cont -->
                            </div>

                        </div> <!-- tab content -->
                    </div>
                </div> <!-- corses singel left -->

            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="course-features mt-30">
                            <h4>Course Features </h4>
                            <ul>
                                <!-- <li><i class="fa fa-clock-o"></i>Durée :<span>{{ $Publication->durée }}</span></li>
                                <li><i class="fa fa-clone"></i>Nombre de seance :<span>{{ $Publication->Nbseance }}</span></li>
                                <li><i class="fa fa-user-o"></i>Students : <span></span></li> -->
                            </ul>
                            <div class="events-coundwon bg_cover" data-overlay="8" style="background-image: url({{ getImage($Publication) }})">
                                <div data-countdown="{{ $Publication->date_finale }}"></div>
                                <div class="events-coundwon-btn pt-30">
                                    @if(Auth::user())
                                    <form action="{{route('inscriptionPub')}}" method="post">
                                        @csrf
                                        <input name="publications_id" type="text" hidden value="{{ $Publication->id }}">
                                        <input name="user_id" type="text" hidden value="{{  Auth::user()->id }}">
                                        @if($Publication->date_finale<=Carbon\Carbon::now()) <button name="submit" type="submit" class="main-btn2" disabled>L'inscription est fermée</button>
                                            @else
                                            @if($inscrite==0)
                                            <button name="submit" type="submit" class="main-btn">S'inscrire</button>
                                            @else
                                            <button name="submit" type="submit" class="main-btn2" disabled>Vous êtes déjà inscrit</button>
                                            @endif

                                            @endif
                                    </form>
                                    @else
                                    <a href="{{ route('login') }}"><button name="submit" type="submit" class="main-btn2">Connectez-vous pour inscrire</button></a>
                                    @endif

                                </div>
                            </div> <!-- events coundwon -->
                        </div>
                    </div>
                </div> <!-- row -->

            </div> <!-- container -->
</section>

@endsection