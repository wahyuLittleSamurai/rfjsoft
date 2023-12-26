<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\MasterProfileCompany;

class rjsoft extends Controller
{
    public function index()
    {
        $resProfileCompanies = DB::select("SELECT * FROM masterprofilecompany 
                                WHERE IsActive = 1 
                                ORDER BY CreateDate DESC 
                                LIMIT 1");
        $resServices = DB::select("SELECT * FROM masterservice WHERE IsActive = 1");
        return view('home', [
            "sliding" => true,
            "tagline" => $resProfileCompanies[0],
            "companies" => $resProfileCompanies[0],
            "services" => $resServices,
        ]);
    }
    public function detailService()
    {
        return view('detailService', ["sliding" => false]);
    }
}
