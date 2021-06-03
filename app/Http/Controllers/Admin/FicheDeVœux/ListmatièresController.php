<?php

namespace App\Http\Controllers\Admin\FicheDeVœux;

use App\Http\Controllers\Controller;
use App\Models\ListMatière;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;

class ListmatièresController extends Controller
{
    public function index()
    {
        
        $datas =ListMatière::all();

        return view('AdminPanel.FicheDeVœux.listmatières',compact('datas'));


        
    }

    public function store(Request $request)
    {
        $fileModel = new ListMatière;

        if($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('app/Admin-uploads/ListMatière', $fileName);
            if($request->file()) {
                
            }
            $fileModel->name = $request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            

     
            return back()->with('success', 'Succès');

        
           
    }}
}
