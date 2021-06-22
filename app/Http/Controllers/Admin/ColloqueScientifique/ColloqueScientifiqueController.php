<?php

namespace App\Http\Controllers\Admin\ColloqueScientifique;

use App\Http\Controllers\Controller;
use App\Models\ColloqueScientifique;
use PDF;
use Illuminate\Http\Request;

class ColloqueScientifiqueController extends Controller
{
    public function index()
    {
        $datas = ColloqueScientifique::all();
        return view('AdminPanel.ColloqueScientifique.ColloqueScientifique', compact('datas'));
    }

    public function show($id)
    {
        $data = ColloqueScientifique::findOrFail($id);

        return view('AdminPanel.ColloqueScientifique.ColloqueScientifiqueShow', compact('data'));
    }
    public function destroy(request $request)
    {
        $Rattrapage = ColloqueScientifique::findOrFail($request->id);
        $Rattrapage->delete();
        return back();
    }

    public function pdf($id)
    {
        $data = ColloqueScientifique::findOrFail($id);


        $pdf = PDF::loadView('Demand.ColloqueScientifiquePDF', compact('data'));

        return $pdf->download('ColloqueScientifique.pdf');
    }
}
