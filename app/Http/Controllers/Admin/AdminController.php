<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Show the admin dashboard.
     *
     * @return View
     */
    public function index()
    {
        return view('AdminPanel.index');
    }

}
