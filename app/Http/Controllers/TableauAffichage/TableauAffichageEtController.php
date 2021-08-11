<?php

namespace App\Http\Controllers\TableauAffichage;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use App\Models\ListClass;
use App\Models\TableauAffichage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Response;

class TableauAffichageEtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $Etclass = ListClass::where('class', Auth::user()->class)->first();
        $datas = TableauAffichage::where('class', $Etclass->id)->orWhere('class', 'Tout')->latest()->paginate(3);



        return view('TableauAffichage.TableauAffichageEt', compact('datas'));
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
    public function show($slug)
    {
    }

    public function télécharger($id)
    {
        $data = TableauAffichage::where('id', $id)->first();
        $file = storage_path($data->file_path);
        return Response::download($file, $data->file_name);
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
