<?php

namespace App\Http\Controllers;

use App\Models\GSTBillsModel;
use App\Models\PartiesModel;
use App\Models\PartiesTypeModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function dashboard()
    {
        if(Auth::user()->is_role == 1)
        {
            $datos['PartiesType'] = PartiesTypeModel::count();
            $datos['Parties'] = PartiesModel::count();
            $datos['GST'] = GSTBillsModel::count();
            return view('admin.dashboard', $datos);
        }
    }
}