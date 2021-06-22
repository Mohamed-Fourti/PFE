<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListEtudiant;
use App\Models\User;
use File;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class ListetudiantsController extends Controller
{
    public function index()
    {

        $datas = DB::table('list_etudiants')->get();


        return view('AdminPanel.Classes.ListEtudiant', compact('datas'));
    }

    public function create($id)
    {
        //   
    }

    public function store(Request $request)
    {
        $fileModel = new ListEtudiant;

        if ($request->file()) {
            $fileName = $request->file->getClientOriginalName();
            $filePath = $request->file('file')->storeAs('Admin-uploads/ListEtudiant', $fileName);

            $fileModel->name = $request->file->getClientOriginalName();
            $fileModel->file_path = $filePath;
            $fileModel->save();


            return back()->with('msg', 'Succès');
        }
    }

    public function misajour()
    {
        $cins = User::select('cin', 'id', 'class')->get();
        $test = 0;
        $data = ListEtudiant::latest()->first();
        if ($data) {
            $tab = Excel::toCollection(new UsersImport, '../storage/app/' . $data->file_path);
            foreach ($cins as $cin) {

                foreach ($tab as $index => $value) {

                    if (
                        collect($tab[$index])
                        ->first(function ($value) use ($cin) {
                            return $value['cin'] == $cin->cin;
                        })
                    ) {
                        if (
                            collect($tab[$index])
                            ->first(function ($value) use ($cin) {
                                return $value['class'] == $cin->class;
                            }) == NULL
                        ) {
                            $ExcelImport = collect($tab[$index])
                                ->first(function ($value) use ($cin) {
                                    return $value['cin'] == $cin->cin;
                                })->only('class');
                            User::where('id', $cin->id)->update([
                                'class' => $ExcelImport['class']
                            ]);
                            $test = 1;
                        }
                    }
                }
            }

            if ($test == 0) {
                return redirect()->back()->with('msg', 'Pas de mise à jour');
            } else {
                return redirect()->back()->with('msg', 'mise à jour');
            }
        } else {
            return redirect()->back()->with('msg', 'Aucun fichier excel à mettre à jour à partir de ');
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

    function delete(request $request)
    {
        $List = ListEtudiant::findOrFail($request->id);

        if (Storage::exists($List->file_path)) {
            Storage::delete($List->file_path);
            $List->delete();
        } else {
            return redirect()->back()->with('msg', 'fichier ne existe pas');
        }
        return redirect()->back()->with('msg', 'deleted');
    }
}
