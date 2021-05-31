<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Publication;
use App\Http\Requests\Front\SearchRequest;
use App\Models\Inscription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PublicationController extends Controller
{
      /**
     * Display a listing of the posts.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $nlast  = DB::table('publications')->whereActive(true)->orderBy('created_at', 'desc')->
      where('categories_id',3)
      ->first();
        



          if(Publication::where('categories_id',1)->orWhere('categories_id',2)->count()!=0){
          $formEtevens = Publication::select(
            'id',
            'slug',
            'image',
            'title',
            'excerpt',
            'created_at',
            'categories_id',
            'user_id')
          ->whereActive(true)->where('categories_id',1)->orWhere('categories_id',2)->take(3)->latest()->get();
            }
          else{
            $formEtevens = Publication::all()
            ->where('categories_id',1)->where('categories_id',2);
          }

          
          if(Publication::where('categories_id',3)->count()!=0){
            $nouveautés = Publication::select(
              'id',
              'slug',
              'image',
              'title',
              'body',
              'created_at',
              'categories_id',
              'date_finale',
              'date_début',
              'lieu',
              'excerpt',
              'user_id',
              'formateur',
              'durée',
              'Nbseance',)
            ->whereActive(true)->latest()->where('created_at', '<',$nlast->created_at)->take(4)->get();}
            else{
              $nouveautés = Publication::all()
              ->where('categories_id',3);
            }
          

          if(Publication::where('categories_id',3)->count()!=0){

          $nouveautélasts = Publication::select(
            'id',
            'slug',
            'image',
            'title',
            'body',
            'created_at',
            'categories_id',
            'date_finale',
            'date_début',
            'lieu',
            'excerpt',
            'user_id',
            'formateur',
            'durée',
            'Nbseance',)
          ->whereActive(true)->where('id',$nlast->id)->get();}
          else{
            $nouveautélasts = Publication::all()->where('categories_id',3);
          }

        return view('accueil', compact('nouveautés','nouveautélasts','formEtevens','nlast'));
    }



    public function show( $slug)
    {
      $categories_id = request()->ca;

      $Publication=Publication::select(
        'id',
        'slug',
        'image',
        'title',
        'body',
        'created_at',
        'categories_id',
        'date_finale',
        'date_début',
        'lieu',
        'excerpt',
        'user_id',
        'formateur',
        'durée',
        'Nbseance',)
      ->with('user:id,nom')
      ->whereActive(true)
      ->where('slug',$slug)->first();
      if($user = Auth::user())
      {
        $inscrite=Inscription::where('user_id',Auth::user()->id)->where('publications_id',$Publication->id)->count();
      }
      else{$inscrite='';}
  if($categories_id==1){
    return view('Publication.évènement', compact('Publication','inscrite'));
 }
  if($categories_id==2){
    return view('Publication.formation', compact('Publication','inscrite'));
  }
  if($categories_id==3){
    return view('Publication.nouveauté', compact('Publication','inscrite'));
  }
 }

 public function showall( )
 {
  $test = Publication::all();
  if($test->isNotEmpty()){

    $publications = Publication::select(
      'id',
      'slug',
      'image',
      'title',
      'excerpt',
      'body',
      'created_at',
      'categories_id',
      'user_id',
      'formateur',
      'durée',
      'Nbseance',)
    ->whereActive(true)->latest()->paginate(2);
    return view('Publication.publications', compact('publications'));
  }
  else{
    return view('Publication.publications')->with('Msg','pas de Publication.');
  }

 }




    /**
     * Get posts with search
     *
     * @param  \App\Http\Requests\SearchRequest $request
     * @return \Illuminate\Http\Response
     */
    public function search(SearchRequest $request)
    {
        $search = $request->search;
        $posts = $this->postRepository->search($this->nbrPages, $search);
        $title = __('Posts found with search: ') . '<strong>' . $search . '</strong>';

        return view('front.index', compact('posts', 'title'));
    }

}
