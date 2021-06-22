@extends('layouts.app')

@section('content')
<section id="blog-singel" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="blog-details mt-30">
                    <div class="thum">
                        <img src="{{ getImage($Publication) }}" alt="" style="width:100%">
                    </div>
                    <div class="cont">
                        <h3>{{ $Publication->title }}</h3>
                        <ul>
                            <li><a href="#"><i class="fa fa-calendar"></i>{{ $Publication->created_at }}</a></li>
                            <li><a href="#"><i class="fa "></i></a></li>
                        </ul>

                        {!! $Publication->body !!}



                    </div> <!-- cont -->
                </div> <!-- blog details -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection