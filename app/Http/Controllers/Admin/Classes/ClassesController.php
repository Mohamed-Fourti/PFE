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
      
            if($request->hasfile('files'))
             {
                foreach($request->file('files') as $key => $file)
                {
                    $name = $file->getClientOriginalName();
                    $path = $file->storeAs('uploads', $name, 'excel');
     
                    $insert[$key]['name'] = $name;
                    $insert[$key]['file_path'] = $path;
     
                }
             }
     
            File::insert($insert);
     
            return back()->with('success', 'File uploaded');

        
           
    }

 
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
