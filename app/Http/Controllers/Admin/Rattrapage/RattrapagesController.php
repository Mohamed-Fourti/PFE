<?php

namespace App\Http\Controllers\Admin\Rattrapage;

use App\Http\Controllers\Controller;
use App\Models\Rattrapage;
use Illuminate\Http\Request;
use PDF;

class RattrapagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=Rattrapage::all();
        return view('AdminPanel.Rattrapage.rattrapage',compact('datas'));
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
        $data=Rattrapage::findOrFail($id);

        return view('AdminPanel.Rattrapage.rattrapageShow',compact('data'));
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
    public function destroy(request $request)
    {
        $Rattrapage = Rattrapage::findOrFail($request->id);
        $Rattrapage->delete();
        return back();
    }

    public function pdf($id)
    {
        $data = Rattrapage::findOrFail($id);
    

        $pdf = PDF::loadView('AdminPanel.Rattrapage.pdf', compact( 'data'));
        
        return $pdf->download('Rattrapage.pdf');        
    }
}
