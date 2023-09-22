<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DataStaff;

class AdminController extends Controller
{
    protected function GetSidebar()
    {
        $resTmp = DB::select("select * from mastersidebar");
        return json_encode($resTmp);
        
    }
    public function DashAdmin()
    {
        $resData = $this->GetSidebar();
        return view('Admin.dashboardAdmin', [
            "sidebars" => $resData,
        ]);
    }
    public function DataStaff()
    {
        $resData = $this->GetSidebar();
        $resStaffs = DataStaff::all()->where('IsActive', '=', 1);
        return view('Admin.dataStaff', [
            "sidebars" => $resData,
            "staffs" => $resStaffs,
        ]);
    }
}