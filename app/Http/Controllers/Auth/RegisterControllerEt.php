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
use App\Models\ListEtudiant;
use App\Notifications\NewUserNotification;
use Illuminate\Support\Facades\DB;

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
        return Validator::make($data, [

            'nom' => ['required', 'string', 'max:255'],
            'prenom' => ['required', 'string', 'max:255'],
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


        $usersid = DB::table('role_user')->where('role_id', '1')->get('user_id');
        $dataUser = User::orderBy('created_at', 'desc')->first();

        foreach ($usersid as $users) {
            User::findOrFail($users->user_id)->notify(new NewUserNotification($dataUser));
        }

        return $user->attachRole($data['role_id']);
    }


    public function import(Request $request)
    {


        $request->validate([
            'cin' => 'unique:users|max:255',

        ]);


        $cin = $request->input('cin');


        $data = ListEtudiant::latest()->first();
        $tab = Excel::toCollection(new UsersImport, '../storage/app/' . $data->file_path);

        foreach ($tab as $index => $value) {

            if (
                $ExcelImport = collect($tab[$index])
                ->first(function ($value) use ($cin) {
                    return $value['cin'] == $cin;
                })
            ) {
                return view('auth.registerEtudiant', compact('ExcelImport'));
            }
        }
        if (
            $ExcelImport = collect($tab[$index] == null)
        ) {
            return redirect('inscription')->withErrors(['CIN n"existe pas']);
        }
    }
    public function showRegistrationFormet()
    {
        return view('auth.registerEtudiant');
    }
}
