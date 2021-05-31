<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Imports\MatiereImport;
use App\Models\FichedevœuxOF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FicheDeVœuxController extends Controller
{
    public function index($sem)
    {
        if (FichedevœuxOF::where('sem', 'S1')->where('Active','1')->count()==1) {

            $Mat = Excel::toCollection(new MatiereImport, '..\storage\excel\uploads\Mat.xlsx');
            $filtered = $Mat[0]->where('sem', 'S1');
            $filtered->all();
            
        }

        if (FichedevœuxOF::where('sem', 'S2')->where('Active','1')->count()==1) {

            $Mat = Excel::toCollection(new MatiereImport, '..\storage\excel\uploads\Mat.xlsx');
            $Matieres = $Mat[0]->where('sem', 'S2');
            $Matieres->all();

        }
        else{}

        return view('FicheDeVœux.fichedevœux', compact('Matieres'));
    }
}
