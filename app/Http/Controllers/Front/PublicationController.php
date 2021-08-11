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
    $nlast  = DB::table('publications')->whereActive(true)->orderBy('created_at', 'desc')->where('categories_id', 3)
      ->first();




    if (Publication::where('categories_id', 1)->orWhere('categories_id', 2)->where('active', true)->count() != 0) {
      $formEtevens = Publication::select(
        'id',
        'slug',
        'image',
        'title',
        'excerpt',
        'lieu',
        'created_at',
        'categories_id',
        'user_id'
      )
        ->where('active', true)->where('categories_id', 1)->orWhere('categories_id', 2)->take(3)->latest()->get();
    } else {
      $formEtevens = null;
    }


    if (Publication::where('categories_id', 3)->where('active', true)->count() != 0) {
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
        'Nbseance',
      )
        ->where('active', true)->latest()->where('categories_id', 3)->where('created_at', '<', $nlast->created_at)->take(3)->get();
    } else {
      $nouveautés = null;
    }


    if (Publication::where('categories_id', 3)->where('active', true)->count() != 0) {

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
        'Nbseance',
      )
        ->where('active', true)->where('categories_id', 3)->where('id', $nlast->id)->get();
    } else {
      $nouveautélasts = null;
    }

    return view('accueil', compact('nouveautés', 'nouveautélasts', 'formEtevens'));
  }



  public function show($slug)
  {
    $categories_id = request()->ca;

    $Publication = Publication::select(
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
      'Nbseance',
    )
      ->with('user:id,nom')
      ->whereActive(true)
      ->where('slug', $slug)->first();
    if ($Publication) {
      if ($user = Auth::user()) {
        $inscrite = Inscription::where('user_id', Auth::user()->id)->where('publications_id', $Publication->id)->count();
      } else {
        $inscrite = '';
      }
      if ($categories_id == 1) {
        return view('Publication.évènement', compact('Publication', 'inscrite'));
      }
      if ($categories_id == 2) {
        return view('Publication.formation', compact('Publication', 'inscrite'));
      }
      if ($categories_id == 3) {
        return view('Publication.nouveauté', compact('Publication', 'inscrite'));
      }
    } else {
      return redirect()->back();
    }
  }


  public function showall()
  {
    $test = Publication::all();
    if ($test->isNotEmpty()) {

      $publications = Publication::select(
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
        'Nbseance',
      )
        ->whereActive(true)->latest()->paginate(1);
      return view('Publication.publications', compact('publications'));
    } else {
      return view('Publication.publications')->with('Msg', 'Pas de Publication.');
    }
  }

  public function showallByCategories($ca)
  {
    $test = Publication::all();
    if ($test->isNotEmpty()) {

      $publications = Publication::select(
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
        'Nbseance',
      )
        ->where('categories_id', $ca)->whereActive(true)->latest()->paginate(1);
      return view('Publication.publications', compact('publications'));
    } else {
      return view('Publication.publications')->with('Msg', 'pas de Publication.');
    }
  }
}
