<?php

namespace App\Http\Controllers\Admin\TableauAffichage;

use App\Http\Controllers\Controller;
use App\Models\Emploi_temp;
use App\Models\ListClass;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

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
        if ($request->file()) {
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
    }



    function delete($id, $name)
    {
        $file = File::findOrFail($id);
        $file->delete();
        unlink('..\storage\excel\uploads\\' . $name);
        return redirect()->back()->with('msg', 'deleted');
    }
}
