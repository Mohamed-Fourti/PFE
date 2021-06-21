<?php

namespace App\Http\Controllers\Admin\TableauAffichage;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ListClass;
use App\Models\TableauAffichage;
use App\Models\TableauAffichageAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class TableauAffichageAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = TableauAffichageAdmin::all();


        return view('AdminPanel.TableauAffichage.ListTableauAffichage', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $active = '';
        $categories = Category::all();
        $classes = ListClass::all();
        return view('AdminPanel.TableauAffichage.NewTableauAffichage', compact('categories', 'active', 'classes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileModel = $request->except('image');

        $request->merge([
            'active' => $request->has('active'),
        ]);
        if ($request->file()) {

            $fileName = $request->file->getClientOriginalName();
            $fileNameCry = md5($fileName) . $fileName;

            $filePath = $request->file('file')->storeAs('public/plansétudes-fichesmatières', $fileNameCry);
            $file_path = '/storage/' . $filePath;
            $fileModel = Arr::add($fileModel, 'file_path', $file_path);
            $fileModel = Arr::add($fileModel, 'file_name', $fileName);
        }

        $fileModel = Arr::add($fileModel, 'user_id', Auth::user()->id);
        $fileModel = Arr::add($fileModel, 'image', basename($request->image));
        TableauAffichage::create($fileModel);

        return back()->with('ok', __('The post has been successfully created'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(request $request)
    {
        $Publication = TableauAffichageAdmin::findOrFail($request->id);
        $Publication->delete();
        return back();
    }
}
