<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rattrapage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Imports\MatiereImport;
use App\Models\Fichedevœux;
use App\Models\FichedevœuxOF;
use App\Models\ListMatière;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class RattrapageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=FichedevœuxOF::all();

        if (FichedevœuxOF::where('sem', 'S1')->where('Active','1')->count()==1) {
            $data=ListMatière::latest()->first();
            $Mat = Excel::toCollection(new MatiereImport,'..'. $data->file_path);
            $S1 = $Mat[0]->where('sem', 'S1');
            $S3 = $Mat[0]->where('sem', 'S3');
            $S5 = $Mat[0]->where('sem', 'S5');

            $Matieres = collect();
            $Matieres = $Matieres->merge($S1);
            $Matieres = $Matieres->merge($S3);
            $Matieres = $Matieres->merge($S5);
            $sem='S1';
            $semid='1';
            $Matieres->all();
            
        }

        if (FichedevœuxOF::where('sem', 'S2')->where('Active','1')->count()==1) {
            $data=ListMatière::latest()->first();
            $Mat = Excel::toCollection(new MatiereImport,'Admin-uploads/ListMatière/Mat.xlsx');
            $S2 = $Mat[0]->where('sem', 'S2');
            $S4 = $Mat[0]->where('sem', 'S4');

            $Matieres = collect();
            $Matieres = $Matieres->merge($S2);
            $Matieres = $Matieres->merge($S4);
            $sem='S2';
            $semid='2';
            $Matieres->all();

        }

        return view('Rattrapage.indexRattrapage', compact('Matieres','sem','semid'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'matiere'       => 'required|string|max:255',
            'classe'        => 'required|string|max:255',
            'motifRemplace' => 'required|string|max:255',
            'jour1'         => 'required|date',
            'seance1'       => 'required|string|max:255',
            'jour2'         => 'required|date',
            'seance2'       => 'required|string|max:255',
            'salle'         => 'required|string|max:255',
            
        ]);

        $data=$request->all();
        $data=Arr::add($data,'user_id',Auth::user()->id);
        Rattrapage::create($data);
         return back()->with('success', 'Votre demande de rattpage a été envoyer.');
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

    public function matiere($sem)
    {
   
    }
}
