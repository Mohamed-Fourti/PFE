<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\ColloqueScientifique;
use App\Models\User;
use App\Notifications\ColloqueScientifiqueNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use PDF;

class ColloqueScientifiques extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Demand.ColloqueScientifique');
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
        $data = $request->except(['_token']);
        $data = Arr::add($data, 'user_id', Auth::user()->id);
        ColloqueScientifique::create($data);
        $usersid = DB::table('role_user')->where('role_id', '1')->get('user_id');
        $dataUser = ColloqueScientifique::orderBy('created_at', 'desc')->first();

        foreach ($usersid as $users) {
            User::findOrFail($users->user_id)->notify(new ColloqueScientifiqueNotification($dataUser));
        }
        return redirect()->route('/');
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




    public function pdf($id)
    {
        $id = Auth::user()->id;
        $data = ColloqueScientifique::where($id)->first();;
        $pdf = PDF::loadView('Demand.ColloqueScientifiquePDF', compact('data'));

        return $pdf->download('rgpd.pdf');
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
}
