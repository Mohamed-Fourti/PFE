@extends('layouts.app')

@section('content')
<section id="event-singel" class="pt-100 pb-100 gray-bg">
    <div class="container">
        <div class="events-area">
            <div class="row">
                <div class="col-lg-8">
                    <div class="events-left">
                        <span>
                            <h3>{{ $Publication->title }}</h3>
                        </span>
                        <span><i class="fa fa-calendar"></i> {{ $Publication->created_at }}</span>
                        <img src="{{ getImage($Publication) }}" alt="Event" style="width:100%">
                        {!! $Publication->body !!}
                    </div> <!-- events left -->
                </div>
                <div class="col-lg-4">
                    <div class="events-right " style=" margin-top: 105px;">
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
                        <div class="events-address mt-30">
                            <ul>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>Heure de début</h6>
                                            <span>{{ Carbon\Carbon::parse($Publication->date_début)->format('H:i') }}</span>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-bell-slash"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>Heure de fin</h6>
                                            <span>{{ Carbon\Carbon::parse($Publication->date_finale)->format('H:i') }}</span>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                                <li>
                                    <div class="singel-address">
                                        <div class="icon">
                                            <i class="fa fa-map"></i>
                                        </div>
                                        <div class="cont">
                                            <h6>Lieu</h6>
                                            <span>{{ $Publication->lieu }}</span>
                                        </div>
                                    </div> <!-- singel address -->
                                </li>
                            </ul>
                        </div> <!-- events address -->
                    </div> <!-- events right -->
                </div>
            </div> <!-- row -->
        </div> <!-- events-area -->
    </div> <!-- container -->
</section>



@endsection