<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Inscription;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{


    public function store(Request $request)
    {
        $data=$request->all();
        Inscription::create($data);
        return back();

    }
}
