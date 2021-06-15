<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Models\ListClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListEtudiant;

class ListClassesController extends Controller
{
    public function index()
    {
        
        $datas=DB::table('list_classes')->get();

        return view('AdminPanel.Classes.ListClasses',compact('datas'));
  
    }

    public function create($id)
    {
         //   
    }

    public function store(Request $request)
    {
    $data=$request->except(['_token']);;
    DB::table('list_classes')->insert($data);        
    
 
     return back()->with('success', 'Succès');
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

    public function destroy(request $request)
    {
        $Publication = ListClass::findOrFail($request->id);
        $Publication->delete();
        return back();
    }

    function delete($request)
    {


    }
    
    
}
