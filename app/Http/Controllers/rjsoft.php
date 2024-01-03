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
        $resPortfolios = DB::select("SELECT REPLACE(ms.ServiceName, ' ', '_') ServiceNameClass, ms.ServiceName, p.*
                            FROM portofolio AS p
                            LEFT JOIN masterservice AS ms ON ms.Kode = p.KodeService
                            WHERE p.IsActive = 1 AND ms.IsActive = 1");
        $resNamePortfolios = DB::select("SELECT REPLACE(ms.ServiceName, ' ', '_') ServiceNameClass, 
                                    MAX(ServiceName) ServiceName
                                FROM portofolio AS p
                                LEFT JOIN masterservice AS ms ON ms.Kode = p.KodeService
                                WHERE p.IsActive = 1 AND ms.IsActive = 1
                                GROUP BY ms.ServiceName");
        $resStaff = DB::select("SELECT StaffName, Photo, Position, Phone, Email FROM masterstaff WHERE IsActive = 1");
        $resDetailCompany = DB::select("SELECT Name, Icon, Link FROM detailcompany
                                WHERE KodeCompany = 
                                (
                                    SELECT Kode FROM masterprofilecompany 
                                    WHERE IsActive = 1 
                                    ORDER BY CreateDate DESC 
                                    LIMIT 1
                                ) AND IsActive = 1");
        return view('home', [
            "sliding" => true,
            "tagline" => $resProfileCompanies[0],
            "companies" => $resProfileCompanies[0],
            "services" => $resServices,
            "clients" => $resClients,
            "portfolios" => $resPortfolios,
            "portfoliosName" => $resNamePortfolios,
            "staffs" => $resStaff,
            "detailsCompanies" => $resDetailCompany,
        ]);
    }
    public function detailService()
    {
        return view('detailService', ["sliding" => false]);
    }
    public static function filteringObj($obj, $myValue)
    {
        
        $resFilter = array_filter($obj, function ($item) use ($myValue) {
            return $item->Name == $myValue; 
        });
        if (count($resFilter) > 0)
        {
            foreach($resFilter as $row)
            {
                return $row->Link;
            }
        }
        else
        {
            return null;
        }

        
    }
}
