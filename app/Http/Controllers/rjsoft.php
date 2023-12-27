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
        $resClients = DB::select("SELECT * FROM masterclient WHERE IsActive = 1");
        $resPortfolios = DB::select("SELECT ms.ServiceName, p.*
                            FROM portofolio AS p
                            LEFT JOIN masterservice AS ms ON ms.Kode = p.KodeService
                            WHERE p.IsActive = 1 AND ms.IsActive = 1");
        return view('home', [
            "sliding" => true,
            "tagline" => $resProfileCompanies[0],
            "companies" => $resProfileCompanies[0],
            "services" => $resServices,
            "clients" => $resClients,
            "portfolios" => $resPortfolios,
        ]);
    }
    public function detailService()
    {
        return view('detailService', ["sliding" => false]);
    }
}
