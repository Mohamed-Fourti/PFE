<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Rattrapage;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\ListClass;
use App\Models\User;
use App\Notifications\RattrapageNotification;
use Illuminate\Support\Facades\DB;

class RattrapageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $classes = ListClass::all();

        return view('Rattrapage.indexRattrapage', compact('classes'));
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
        $request->validate([
            'matiere'       => 'required|string|max:255',
            'classe'        => 'required|string|max:255',
            'motifRemplace' => 'required|string|max:255',
            'salle'         => 'required|string|max:255',

        ]);

        $data = $request->all();
        $data = Arr::add($data, 'user_id', Auth::user()->id);
        Rattrapage::create($data);
        $usersid = DB::table('role_user')->where('role_id', '1')->get('user_id');
        $dataUser = Rattrapage::orderBy('created_at', 'desc')->first();

        foreach ($usersid as $users) {
            User::findOrFail($users->user_id)->notify(new RattrapageNotification($dataUser));
        }
        return back()->with('success', 'Votre demande de rattpage a été envoyer.');
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
    public function destroy($id)
    {
        //
    }

    public function matiere($sem)
    {
    }
}
