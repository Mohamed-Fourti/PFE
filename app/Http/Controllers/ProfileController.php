<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Hash;
use Mpdf\Tag\Input;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $data = User::where('id', $id)->first();
        return view('profile', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
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
    public function update(Request $request)
    {
        if ($request->get('password') == '') {
            if ($request->file('image')) {

                $fileName = $request->image->getClientOriginalName();

                $filePath = $request->file('image')->storeAs(Auth::user()->id . '/photo_de_profil/', $fileName, ['disk' => 'public']);

                $fileModel = $request->except(['_token', 'password', 'image']);
                $fileModel = Arr::add($fileModel, 'image', $filePath);

                User::where('id', Auth::user()->id)->update($fileModel);

                return redirect()->back();


                return back()->with('success', 'Succès');
            }
            $fileModel = $request->except(['_token', 'password']);

            User::where('id', Auth::user()->id)->update($fileModel);
            return redirect()->back();
        } else {

            if ($request->file()) {
                $fileName = $request->image->getClientOriginalName();

                $filePath = $request->file('image')->storeAs('public/' . Auth::user()->id . '//photo_de_profil/', $fileName);

                $fileModel = $request->except(['_token', 'image']);
                $fileModel = Arr::add($fileModel, 'image', $filePath);

                User::where('id', Auth::user()->id)->update($fileModel);
                return redirect()->back();


                return back()->with('success', 'Succès');
            }
            $fileModel = $request->except(['_token']);

            User::where('id', Auth::user()->id)->update($fileModel);
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
