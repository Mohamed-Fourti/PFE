<?php

namespace App\Http\Controllers\Admin\TableauAffichage;

use App\Http\Controllers\Controller;
use App\Models\Emploi_temp;
use App\Models\ListClass;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use File;
use Illuminate\Support\Facades\Storage;
use Mpdf\Tag\Em;

class EmploitempController extends Controller
{
    public function index()
    {
        $datas = Emploi_temp::all();
        $classes = ListClass::all();

        return view('AdminPanel.TableauAffichage.Emploitemp', compact('datas', 'classes'));
    }

    public function create($id)
    {
        //   
    }

    public function store(Request $request)
    {
        $request->validate([
            'list_classe_id'              => 'required',
            'file'            => 'required',

        ]);
        $fileName = $request->file->getClientOriginalName();
        $fileNameCry = md5($fileName) . $fileName;

        $filePath = $request->file('file')->storeAs('/Emploi-temp', $fileNameCry, ['disk' => 'public']);
        $file_path = '/storage/' . $filePath;
        $fileModel = $request->all();
        $fileModel = Arr::add($fileModel, 'file_path', $file_path);
        $fileModel = Arr::add($fileModel, 'file_name', $fileName);
        Emploi_temp::create($fileModel);



        return back()->with('success', 'Succès');
    }



    function delete(request $request)
    {
        $List = Emploi_temp::findOrFail($request->id);

        if (Storage::exists($List->file_path)) {
            Storage::delete($List->file_path);
            $List->delete();
        } else {
            return redirect()->back()->with('msg', 'fichier ne existe pas');
        }
        return redirect()->back()->with('msg', 'deleted');
    }
}
