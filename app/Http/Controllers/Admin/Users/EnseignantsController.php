<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EnseignantsController extends Controller
{

    public function index()
    {
        $users = User::whereRoleIs('Enseignants')->paginate(3);
        return view('AdminPanel.Users.UsersEn', compact('users'));
    }



    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(User $user)
    {
        //
    }


    public function edit(User $user)
    {
        //
    }


    public function update(Request $request)
    {
        $update = [
            'nom'       =>  $request->nom,
            'prenom'    =>  $request->prenom,
            'email'     =>  $request->email,


        ];
        DB::table('Users')->where('id', $request->id)->update($update);
        return redirect()->back();
    }


    public function destroy(request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back();
    }
}
