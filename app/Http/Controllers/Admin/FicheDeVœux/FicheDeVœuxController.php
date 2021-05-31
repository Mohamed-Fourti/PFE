<?php

namespace App\Http\Controllers\Admin\FicheDeVœux;

use App\Http\Controllers\Controller;
use App\Models\FichedevœuxOF;
use Illuminate\Http\Request;
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
        return view('AdminPanel.FicheDeVœux.fichedevœux',compact('datas'));

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
        //
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
