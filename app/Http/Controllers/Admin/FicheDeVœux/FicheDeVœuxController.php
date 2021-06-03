<?php

namespace App\Http\Controllers\Admin\FicheDeVœux;

use App\Http\Controllers\Controller;
use App\Models\EtuMat;
use App\Models\FichedevœuxOF;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class FicheDeVœuxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $datas=FichedevœuxOF::all();
        $EtuMats=EtuMat::all();
        $S1=FichedevœuxOF::where('sem','S1')->where('active','1')->count();
        $S2=FichedevœuxOF::where('sem','S2')->where('active','1')->count();
        return view('AdminPanel.FicheDeVœux.fichedevœux',compact('datas','S1','S2','EtuMats'));

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
        

        if($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('plansétudes-fichesmatières', $fileName, 'app/Admin-uploads');
            $file_path = '/storage/' . $filePath;
            
           $fileModel=$request->all();
           $fileModel=Arr::add($fileModel,'file_path',$file_path);
           $fileModel=Arr::add($fileModel,'name',$fileName);
           EtuMat::create($fileModel);        


     
            return back()->with('success', 'Succès');   
        
    }
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
    public function update(Request $request)
    {

    }

    public function Ouverture($id)
    {


        DB::table('fichedevœux_o_f_s')->where('id',$id)->update(array('active' => '1'));
        return back();


    }

    public function Fermeture($id)
    {


        DB::table('fichedevœux_o_f_s')->where('id',$id)->update(array('active' => '0'));
        return back();


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
