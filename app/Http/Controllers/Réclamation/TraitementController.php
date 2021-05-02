<?php

namespace App\Http\Controllers\Réclamation;

use App\Http\Controllers\Controller;
use App\Mail\RéclamationTraite;
use App\Models\Réclamation;
use App\Models\Traitement;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail ;
class TraitementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
    $Réclamation=Réclamation::findOrFail($id);
      return view('Réclamation.traitement',compact('Réclamation'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data=$request->all();
        $data['hardware'] = $request->input('hardware');
        $data=Arr::add($data,'technicien_id',Auth::user()->id);
        Traitement::create($data);

          if($request->input('résultat')=='avec succès')
          {
  
            $Réclamation=Réclamation::where('id',$request->input('réclamation_id'))->first();
            $Réclamation->etat='traité';
            $Réclamation->save();
            Mail::to($Réclamation->user->email)->send(new RéclamationTraite($Réclamation));

          }
          return redirect('/home')->with('message','Le traitement a été enrgistrée avec succès');;
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
}
