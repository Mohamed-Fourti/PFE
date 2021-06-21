<?php

namespace App\Http\Controllers\Admin\FicheDeVœux;

use App\Http\Controllers\Controller;
use App\Models\ListClass;
use App\Models\ListMatière;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ListmatièresController extends Controller
{
    public function index()
    {

        $datas = DB::table('list_matières')->get();


        return view('AdminPanel.FicheDeVœux.listmatières', compact('datas'));
    }

    public function store(Request $request)
    {
        $fileModel = new ListMatière;

        if ($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('public/Admin-uploads/ListMatière', $fileName);

            $fileModel->name = $request->file->getClientOriginalName();
            $fileModel->file_path = $filePath;
            $fileModel->save();



            return back()->with('success', 'Succès');
        }
    }

    function delete(request $request)
    {
        $List = ListMatière::findOrFail($request->id);

        if (Storage::exists($List->file_path)) {
            Storage::delete($List->file_path);
            $List->delete();
        } else {
            return redirect()->back()->with('success', 'fichier ne existe pas');
        }
        return redirect()->back()->with('success', 'deleted');
    }
}
