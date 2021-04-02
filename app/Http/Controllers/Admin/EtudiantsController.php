<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class EtudiantsController extends Controller
{

    public function index()
    {
        $users=User::whereRoleIs('Etudiants')->get();
        return view('AdminPanel.Users',compact('users'));
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

 
    public function update(Request $request, User $user)
    {
        //
    }

 
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
