<?php

namespace App\Http\Controllers\Admin\FicheDeVœux;

use App\Http\Controllers\Controller;
use App\Models\ListMatière;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class ListmatièresController extends Controller
{
    public function index()
    {
        
        $datas =DB::table('list_matières')->get();


        return view('AdminPanel.FicheDeVœux.listmatières',compact('datas'));


        
    }

    public function store(Request $request)
    {
        $fileModel = new ListMatière;

        if($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('Admin-uploads/ListMatière', $fileName);
            if($request->file()) {
                
            }
            $fileModel->name = $request->file->getClientOriginalName();
            $fileModel->file_path =$filePath;
            $fileModel->save();

            

     
            return back()->with('success', 'Succès');

        
           
    }
}
}
