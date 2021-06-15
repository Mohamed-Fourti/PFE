<?php

namespace App\Http\Controllers\TableauAffichage;

use App\Http\Controllers\Controller;
use App\Models\ListClass;
use App\Models\TableauAffichage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TableauAffichageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->hasRole('Enseignants|admin')) {
            $classes = ListClass::all();
            $datas = TableauAffichage::where('user_id', Auth::user()->id)->paginate(3);
            return view('TableauAffichage.TableauAffichageEn', compact('datas', 'classes'));
        } else if (Auth::user()->hasRole('Etudiants')) {
        }
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
        $fileModel = new TableauAffichage;

        if ($request->file()) {

            $fileName = $request->file->getClientOriginalName();
            $fileNameCry = md5($fileName) . $fileName;
            $fileName = $fileName;
            $filePath = $request->file('file')->storeAs(Auth::user()->id . '/TableauAffichage', $fileNameCry, ['disk' => 'public']);
            $file_path = '/storage/' . $filePath;
            $fileModel = $request->all();
            $fileModel = Arr::add($fileModel, 'file_path', $file_path);
            $fileModel = Arr::add($fileModel, 'file_name', $fileName);
            $fileModel = Arr::add($fileModel, 'user_id', Auth::user()->id);
            TableauAffichage::create($fileModel);
            return back()->with('success', 'Succès');
        } else {
            $fileModel = $request->all();
            $fileModel = Arr::add($fileModel, 'user_id', Auth::user()->id);
            TableauAffichage::create($fileModel);
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
