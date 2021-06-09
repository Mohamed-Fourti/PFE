@extends('layouts.app')

@section('content')
 <section id="blog-page" class="pt-90 pb-120 gray-bg">
        <div class="container">
           <div class="row"><div class="col-lg-8">
           <div class="scrolling-pagination">

               
               @if(!empty($Msg))
  <div class="alert alert-success"> {{ $Msg }}</div>
@else

@foreach($publications as $publication )

                   <div class="singel-blog mt-30">
                       <div class="blog-thum">
                           <img src="{{ getImage($publication) }}">

                       </div>
                       <div class="blog-cont">
                       <a href="{{ route('Publication/show', [$publication->slug, 'ca' => $publication->categories_id ] )  }}">
                                    <h4 id="spanTemps">{{ $publication->title }}</h4>
                                </a>                           <ul>
                               <li><a href="#"><i class="fa fa-calendar"></i>{{ $publication->created_at }}</a></li>
                           </ul>
                           {!! $publication->excerpt !!}             
                                  </div>
                   </div> <!-- singel blog -->
                   
                   @endforeach
 
                   @endif
                   {{ $publications->links() }}
                   
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
                               <div class="categories mt-30">
                                   <h4>Categories</h4>                    
                                   <ul>
                                       <li><a href="{{ route('Publications') }}" >Voir tout</a></li>
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
            loadingHtml: '<div style="text-align: center;"><img src="Dual Ball-1s-200px.svg" alt="Loading" class="ml-auto mr-auto"/></div>',
    padding: 20,

        });
    });



</script>



@endpush