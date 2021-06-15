<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListEtudiant;
use App\Models\User;
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


            return back()->with('success', 'Succès');
        }
    }

    public function misajour()
    {
        $cins = User::select('cin', 'id', 'class')->get();
        $test = 0;
        $data = ListEtudiant::latest()->first();
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
                        })==NULL
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
            return redirect()->back()->with('success', 'no update');

        } else {
            return redirect()->back()->with('success', 'updated');

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

    function delete($id, $name)
    {
        $file = File::findOrFail($id);
        $file->delete();
        unlink('..\storage\excel\uploads\\' . $name);
        return redirect()->back()->with('msg', 'deleted');
    }
}
