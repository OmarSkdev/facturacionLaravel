<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class PartiesTypeController extends Controller
{
    //
    public function parties_type()
    {
        return view('admin.parties_type.list');
    }

    public function parties_type_add()
    {
        return view('admin.parties_type.add');
    }
}