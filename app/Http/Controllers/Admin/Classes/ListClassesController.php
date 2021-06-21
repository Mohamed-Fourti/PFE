<?php

namespace App\Http\Controllers\Admin\Classes;

use App\Http\Controllers\Controller;
use App\Imports\UsersImport;
use App\Models\ListClass;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\ListEtudiant;
use Maatwebsite\Excel\Facades\Excel;

class ListClassesController extends Controller
{
    public function index()
    {

        $datas = DB::table('list_classes')->get();

        return view('AdminPanel.Classes.ListClasses', compact('datas'));
    }

    public function create($id)
    {
        //   
    }

    public function store(Request $request)
    {
        $data = $request->except(['_token']);;
        ListClass::firstOrCreate($data);


        return back()->with('success', 'Succès');
    }


    public function show($name)
    {
    }

    public function ajoute()
    {
        if ((ListEtudiant::all())->isEmpty()) {
            return back()->with('success', 'aucun List d\'Etudiant');
        } else {

            $data = ListEtudiant::latest()->first();

            $tab = Excel::toCollection(new UsersImport, '../storage/app/' . $data->file_path);
            if ($tab[0]->where('class')->count() != 0) {

                $test = $tab[0]->pluck('class')->unique();
                foreach ($test as $ad) {
                    $input['class'] = $ad;
                    ListClass::firstOrCreate($input);
                }
            } else {
                return back()->with('success', 'les données du fichier ne sont pas acceptées,vérifier le contenu du fichier');
            }
        }

        return back()->with('success', 'Succès');
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

    function delete(request $request)
    {
        $Publication = ListClass::findOrFail($request->id);
        $Publication->delete();
        return back();
    }
}
