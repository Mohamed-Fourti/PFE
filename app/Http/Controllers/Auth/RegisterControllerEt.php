<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Illuminate\Http\Request;


use Maatwebsite\Excel\Facades\Excel;
use App\Imports\UsersImport;
use App\Imports\UsersImportClass;

class RegisterControllerEt extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        $registration_key = 'test';
        return Validator::make($data, [
            
            'nom' => ['required', 'string', 'max:255', 'unique:users'],
            'prenom' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => 'required|email|unique:users,email',
            'password' => ['required', 'string', 'min:8', 'confirmed'],


        ]);
        
       
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        ($user = User::create([
            'nom' => $data['nom'],
            'prenom' => $data['prenom'],
            'email' => $data['email'],
            'cin' => $data['cin'],
            'class' => $data['class'],
            'password' => Hash::make($data['password']),
            
        ]));
        return $user->attachRole($data['role_id']);
    }


    public function import(Request $request)
    {
        

        $request->validate([ 
            'cin' => 'unique:users|max:255',
            
        ]);
       
        
        $cin = $request->input('cin');
  

        $tab = Excel::toArray(new UsersImport, '..\storage\excel\uploads\L2 DSI.xls');
        $tabclass = Excel::toArray(new UsersImportClass, '..\storage\excel\uploads\L2 DSI.xls');

        foreach ($tab as $index => $value) {
    
            if (
                $ExcelImport = collect($tab[$index])
                ->first(function ($value) use ($cin) {
                    return $value['cin'] == $cin;
                })
            ) {
                return view('auth.registerEtudiant',compact('ExcelImport','tabclass'));
                
            }
          
            
        }
        if (
            $ExcelImport = collect($tab[$index]==null)
        ) {return redirect('inscription')->withErrors(['CIN n"existe pas']);

             
        }
    
    }
    public function showRegistrationFormet()
    {
        return view('auth.registerEtudiant');
    }

}


