<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class EtudiantsController extends Controller
{

    public function index()
    {
        $users=User::whereRoleIs('Etudiants')->get();
        return view('AdminPanel.Users.UsersEt',compact('users'));
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
        if ($request->get('password') == '') {

        $update = [
            'nom'       =>  $request->nom,
            'prenom'    =>  $request->prenom,
            'email'     =>  $request->email,
            'class'     =>  $request->class,
         
 
        ];
        
        
    DB::table('Users')->where('id',$request->id)->update($update);
    return redirect()->back();
    }
    
    else {

        $update = [
            'nom'       =>  $request->nom,
            'prenom'    =>  $request->prenom,
            'email'     =>  $request->email,
            'class'     =>  $request->class,
            'password'     => Hash::make($request['password']),
         
 
        ];
        
        
    DB::table('Users')->where('id',$request->id)->update($update);
    return redirect()->back();
    }
    }
 
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return back();
    }
}
