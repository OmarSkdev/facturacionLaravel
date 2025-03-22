<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if(Auth::user()->is_role == 1)
        {
            return view('admin.dashboard');
        }
    }
}