<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Models\File;
use Illuminate\Support\Facades\DB;
use App\Imports\UsersImportClass;

class ClassesController extends Controller
{

    public function index()
    {
        
        $datas =DB::table('files')->select('id','name', 'file_path')->get();


        return view('AdminPanel.Classes.classes',compact('datas'));


        
    }

    public function create($id)
    {
         //   
    }

    public function store(Request $request)
    {
        $fileModel = new File;

        if($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('ListEtudiants', $fileName, 'Admin-uploads');

            $fileModel->name = time().'_'.$request->file->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            

     
            return back()->with('success', 'Succès');

        
           
    }}

 
    public function show($name)
    {
        $Filename='..\storage\excel\uploads\\'.$name;
        
        $tabclass = Excel::toArray(new UsersImportClass,$Filename);
        $tab = Excel::toArray(new UsersImport, $Filename);
        
        $ExcelImport = collect($tab);
        $ExcelImportClass = collect($tabclass);
    
    return view('AdminPanel.Classes.classesShow',compact('ExcelImport','ExcelImportClass'));

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
