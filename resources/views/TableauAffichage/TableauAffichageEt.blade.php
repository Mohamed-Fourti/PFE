@extends('layouts.app')

@section('content')
<section id="blog-page" class="pt-90 pb-120 gray-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="scrolling-pagination">


                    @if(!empty($Msg))
                    <div class="alert alert-success"> {{ $Msg }}</div>
                    @else

                    @foreach($datas as $data )

                    <div class="singel-blog mt-30">
                        @if($data->image)
                        <div class="blog-thum">
                            <img src="{{ getImage($data) }}">

                        </div>
                        @endif
                        <div class="blog-cont">

                            <h4 id="spanTemps">{{ $data->title }}</h4>
                            <ul>
                                <li><i class="fa fa-calendar"></i> {{ $data->created_at }}</li>
                                <li><i class="fa fa-user "></i> Publier par {{ $data->user->nom }}</li>
                            </ul>

                            {!! $data->body !!}


                        </div>
                    </div> <!-- singel blog -->

                    @endforeach

                    @endif
                    <div class="row mt-4 d-flex justify-content-center align-items-center ">

                        {{ $datas->links() }}

                    </div>
                </div>

                <!-- courses pagination -->
            </div>
            <div class="col-lg-4">
                <div class="saidbar">
                    <div class="row">
                        <div class="col-lg-12 col-md-6">
                            <div class="categories mt-30">
                                <h4>Categories</h4>
                                <ul>
                                    <li><a href="{{ route('Publications') }}">Voir tout</a></li>
                                    <li><a href="{{ route('Publications/cat','1' )  }}">Évènement</a></li>
                                    <li><a href="{{ route('Publications/cat','2' )  }}">Formation</a></li>
                                    <li><a href="{{ route('Publications/cat','3' )  }}">Nouveauté</a></li>
                                </ul>
                            </div>
                        </div> <!-- categories -->

                    </div> <!-- row -->
                </div> <!-- saidbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection

@push('scripts')
<script>
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            },
            loadingHtml: '<div style="text-align: center;"><img src="/images/Dual Ball-1s-200px.svg" alt="Loading" class="ml-auto mr-auto"/></div>',
            padding: 20,
        });
    });
</script>



@endpush