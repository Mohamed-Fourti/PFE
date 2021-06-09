<?php

namespace App\Http\Controllers\Réclamation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Réclamation;
use App\Models\Traitement;
use App\Models\User;
use App\Notifications\RéclamationNotification;
use Illuminate\Foundation\Auth\User as AuthUser;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;

class RéclamationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistiques=[];
        $statistiques['total']=Réclamation::All()->count();
        $statistiques['encours']=Réclamation::where('etat','en cours')->get()->count();
        $statistiques['creation']=Réclamation::where('etat','création')->get()->count();
        $statistiques['traité']=Réclamation::where('etat','traité')->get()->count();
        $statistiques['priorite']=Réclamation::where('priorite')->get();
        if(Auth::user()->hasRole('Techniciens'))
        {
            $Réclamations=Réclamation::paginate(4);
            return view('Réclamation.indexRéclamationTe',compact('Réclamations','statistiques'));

        }
        else
        {
            $Réclamations=Réclamation::where('user_id',Auth::user()->id)->paginate(3);
            return view('Réclamation.indexRéclamationEn',compact('Réclamations'));

        }
  
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $usersid =DB::table('role_user')->where('role_id','4')->get('user_id');
    
        $data=$request->all();
        $data=Arr::add($data,'user_id',Auth::user()->id);
        Réclamation::create($data);
        foreach($usersid as $user){
            User::findOrFail($user->user_id)->notify(new RéclamationNotification($data));
        }
        // Notification::send($users,new RéclamationNotification($data)) ;     

        // foreach ($users as $user) {

        // }
        return back()->with('message','Votre Réclamation a été crée avec succès');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function consulter($id)
    {
      $traitements=Traitement::where('Réclamation_id',$id)->get();
      $Réclamations =Réclamation::findOrFail($id);
      if($Réclamations->etat=='création')
      {
        $Réclamations->etat='en cours';
        $Réclamations->save();
      }


      return view('Réclamation.réclamationsShow',compact('Réclamations','traitements'));
    }
}
