<?php

namespace App\Http\Controllers\Admin\FicheDeVœux;

use App\Http\Controllers\Controller;
use App\Models\EtuMat;
use App\Models\Fichedevœux;
use App\Models\FichedevœuxOF;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class FicheDeVœuxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $datas = FichedevœuxOF::all();
        $EtuMats = EtuMat::all();
        $S1 = FichedevœuxOF::where('sem', 'S1')->where('active', '1')->count();
        $S2 = FichedevœuxOF::where('sem', 'S2')->where('active', '1')->count();
        return view('AdminPanel.FicheDeVœux.fichedevœux', compact('datas', 'S1', 'S2', 'EtuMats'));
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
    public function storePlanEtuFichesMat(Request $request)
    {


        if ($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $fileNameCry = md5($fileName) . $fileName;

            $filePath = $request->file('file')->storeAs('public/Admin-uploads/plansétudes-fichesmatières', $fileNameCry,);

            $fileModel = $request->all();
            $fileModel = Arr::add($fileModel, 'file_path', $filePath);
            $fileModel = Arr::add($fileModel, 'name', $fileName);
            EtuMat::create($fileModel);

            return back()->with('success', 'Succès');
        }
    }


    public function résultats()
    {
        $datas = Fichedevœux::all();

        return view('AdminPanel.FicheDeVœux.fichedevœuxs', compact('datas'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = FicheDeVœux::findOrFail($id);

        return view('AdminPanel.FicheDeVœux.fichedevœuxsShow', compact('data'));
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
    public function update(Request $request)
    {
    }

    public function Ouverture($id)
    {


        DB::table('fichedevœux_o_f_s')->where('id', $id)->update(array('active' => '1'));
        return back();
    }

    public function Fermeture($id)
    {


        DB::table('fichedevœux_o_f_s')->where('id', $id)->update(array('active' => '0'));
        return back();
    }

    function delete(request $request)
    {
        $List = EtuMat::findOrFail($request->id);

        if (Storage::exists($List->file_path)) {
            Storage::delete($List->file_path);
            $List->delete();
        } else {
            return redirect()->back()->with('success', 'Fichier ne existe pas');
        }
        return redirect()->back()->with('success', 'deleted');
    }

    function deletedemande(request $request)
    {
        $List = Fichedevœux::findOrFail($request->id);

        $List->delete();

        return redirect()->back()->with('success', 'deleted');
    }
}
