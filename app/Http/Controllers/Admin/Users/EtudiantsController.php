<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;

class EtudiantsController extends Controller
{

    public function index()
    {

        $users=User::whereRoleIs('Etudiants')->paginate(3);
        return view('AdminPanel.Users.UsersEt',compact('users'));
    }

    public function search(Request $request)
    {
        $search =$request->get('search');
        $users=User::whereRoleIs('Etudiants')->where('nom','like','%'.$search.'%')->paginate(3);
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

        $validator = Validator::make($request->all(), [
            'nom' => 'required',
            'prenom' => 'required',
            'email' => 'required',
            'class' => 'required',
        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

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
 
    public function destroy(request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();
        return back();
    }
}
