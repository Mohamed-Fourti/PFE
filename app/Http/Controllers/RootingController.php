<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class RootingController extends Controller
{
    public function index()
    {
        
        
      /*  if(Auth::user()->hasRole('admin')){
            return view('AdminIndex');
       }
       elseif(Auth::user()->hasRole('Enseignants')){
            return view('EnseignantsIndex');
       }
       elseif(Auth::user()->hasRole('Techniciens')){
        return view('TechniciensIndex');
       }
       elseif(Auth::user()->hasRole('Etudiants')){
        return view('Etudiants');}
        else{
            return view('index');}*/
     return view('Index');

    }

}
