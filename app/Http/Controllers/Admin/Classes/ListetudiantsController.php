<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListEtudiant;

class ListetudiantsController extends Controller
{
    public function index()
    {
        
        $datas=DB::table('list_etudiants')->get();


        return view('AdminPanel.Classes.ListEtudiant',compact('datas'));


    
    }

    public function create($id)
    {
         //   
    }

    public function store(Request $request)
    {
        $fileModel = new ListEtudiant;

        if($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('Admin-uploads/ListEtudiant', $fileName);
            if($request->file()) {
                
            }
            $fileModel->name = $request->file->getClientOriginalName();
            $fileModel->file_path =$filePath;
            $fileModel->save();

            

     
            return back()->with('success', 'Succès');
           
    }
           
    }

 
    public function show($name)
    {
     

}

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($files)
    {

    }

    function delete($id,$name)
    {
        $file = File::findOrFail($id);
        $file->delete();
        unlink('..\storage\excel\uploads\\'.$name);
        return redirect()->back()->with('msg', 'deleted');

    }
    
}
