<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ListClass;
use App\Models\Publication;
use App\Models\TableauAffichage;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class PublicationEnController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $classes = ListClass::all();

        return view('Publication.publicationsEn', compact('categories', 'classes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'              => 'required|string|max:255',
            'slug'              => 'required|string|max:255',
            'class'            => 'required',

        ]);

        $fileModel = $request->except('image');

        $request->merge([
            'active' => $request->has('active'),
        ]);

        $fileModel = Arr::add($fileModel, 'user_id', Auth::user()->id);
        $fileModel = Arr::add($fileModel, 'image', basename($request->image));
        TableauAffichage::create($fileModel);

        return back()->with('msg', __('Publication Crée'));
    }
}
