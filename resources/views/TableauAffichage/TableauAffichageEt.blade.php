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
                        <div class="blog-cont">

                            <ul>
                                <li><i class="fa fa-calendar"></i> {{ $data->created_at }}</li>
                                <li><i class="fa fa-user "></i> Publier par {{ $data->user->nom }}</li>
                            </ul>
                            {!! $data->remarques !!}


                            <a class="btn btn-secondary" href="{{$data->file_path}}">
                                <h4 id="spanTemps">Télécharger</h4>
                            </a>
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
                            <div class="saidbar-search mt-30">
                                <form action="#">
                                    <input type="text" placeholder="Search">
                                    <button type="button"><i class="fa fa-search"></i></button>
                                </form>
                            </div> <!-- saidbar search -->

                        </div> <!-- categories -->

                    </div> <!-- row -->
                </div> <!-- saidbar -->
            </div>
        </div> <!-- row -->
    </div> <!-- container -->
</section>

@endsection

@push('scripts')




@endpush