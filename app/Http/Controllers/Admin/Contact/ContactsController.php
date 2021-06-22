<?php

namespace App\Http\Controllers\Admin\Contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Contact::all();
        return view('AdminPanel.Contact.Contact', compact('datas'));
    }
    public function destroy(request $request)
    {
        $user = Contact::findOrFail($request->id);
        $user->delete();
        return back();
    }
}
