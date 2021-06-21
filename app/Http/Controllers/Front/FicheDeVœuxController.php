<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Imports\MatiereImport;
use App\Models\EtuMat;
use App\Models\Fichedevœux;
use App\Models\FichedevœuxOF;
use App\Models\ListMatière;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class FicheDeVœuxController extends Controller
{
    public function index($sem)
    {

        $datas = FichedevœuxOF::all();

        $extension = pathinfo(storage_path('/uploads/my_image.jpg'), PATHINFO_EXTENSION);

        if (FichedevœuxOF::where('sem', 'S1')->where('Active', '1')->count() == 1) {
            $data = ListMatière::latest()->first();
            $Mat = Excel::toCollection(new MatiereImport, '../storage/app/' . $data->file_path);
            $S1 = $Mat[0]->where('sem', 'S1');
            $S3 = $Mat[0]->where('sem', 'S3');
            $S5 = $Mat[0]->where('sem', 'S5');

            $Matieres = collect();
            $Matieres = $Matieres->merge($S1);
            $Matieres = $Matieres->merge($S3);
            $Matieres = $Matieres->merge($S5);
            $sem = 'S1';
            $semid = '1';
            $Matieres->all();
            $EtuMats = EtuMat::where('sem', '1')->get();
        }

        if (FichedevœuxOF::where('sem', 'S2')->where('Active', '1')->count() == 1) {
            $data = ListMatière::latest()->first();
            $Mat = Excel::toCollection(new MatiereImport, '../storage/app/' . $data->file_path);
            $S2 = $Mat[0]->where('sem', 'S2');
            $S4 = $Mat[0]->where('sem', 'S4');

            $Matieres = collect();
            $Matieres = $Matieres->merge($S2);
            $Matieres = $Matieres->merge($S4);
            $sem = 'S2';
            $semid = '2';
            $Matieres->all();
            $EtuMats = EtuMat::where('sem', '2')->get();
        } else {
        }

        return view('FicheDeVœux.fichedevœux', compact('Matieres', 'sem', 'semid', 'EtuMats'));
    }


    public function store(Request $request)
    {
        // $validated = $request->validate([
        //     'gsm' => 'required|numeric',
        //     'chargeS1' => 'required|numeric',
        //     'chargeS2' => 'required|numeric',
        //     'Matieres' => 'required',
        //     'jours1' => 'required',
        //     'jours2' => 'required',
        // ]);

        $jours1 = $request->input('jours');
        $jsonjours1 = json_encode($jours1);

        $jours2 = $request->input('jours');
        $jsonjours2 = json_encode($jours2);

        $data = $request->all();
        $data['hardware'] = $request->input('hardware');
        $data = Arr::add($data, 'user_id', Auth::user()->id);
        $data = Arr::add($data, 'jours1', $jsonjours1);
        $data = Arr::add($data, 'jours2', $jsonjours2);
        Fichedevœux::create($data);

        return back()->with('message', 'Le traitement a été enrgistrée avec succès');;
    }
}
