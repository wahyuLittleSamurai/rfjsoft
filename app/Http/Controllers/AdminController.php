<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DataStaff;
use App\Models\MasterProfileCompany;
use App\Models\DataService;
use App\Models\Clients;
use Session;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/* 
1. password register harus di hash dulu
2. column jwt harus pakai 'password' (besar kecil harus seperti itu)
*/
class AdminController extends Controller
{
    protected function GetSidebar()
    {
        $resTmp = DB::select("select * from mastersidebar");
        return json_encode($resTmp);
        
    }
    public function Login()
    {
        $mySession = Session::get('dataUser');
        if($mySession["token"] == "" || $mySession["token"] == null)
        {
            return view('Admin.login', [
                "sidebars" => null,
            ]);
        }
        else
        {
            return redirect('/DashAdmin');
        }
        
    }
    public function LoginStaff(Request $request)
    {
        $credentials = $request->only('Username', 'password');
        
        $rules = [
            'Username' => 'required|email',
            'password' => 'required',
        ];

        //echo Hash::make($credentials["password"]);
        
        
        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return \Redirect::back()->withErrors($validator);
        }
        
        try {
            $credentialsJwt["StaffName"] = $credentials["Username"];
            $credentialsJwt["password"] = $credentials["password"];

            if (! $token = JWTAuth::attempt($credentialsJwt)) {
                return \Redirect::back()->withErrors('Account Tidak Ditemukan');
            }
            else {
                $credentials["token"] = $token;
                $request->session()->put('dataUser', $credentials);
                return redirect('/DashAdmin');
            }
            
        } catch (JWTException $e) {
            return \Redirect::back()->withErrors('Ada Kesalahan Jaringan, Coba Lagi!');
        }
        

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
        //$resStaffs = DataStaff::all()->where('IsActive', '=', 1);
        $resStaffs = DataStaff::all();
        return view('Admin.dataStaff', [
            "sidebars" => $resData,
            "staffs" => $resStaffs,
        ]);
    }
    public function SettingCompany()
    {
        $resData = $this->GetSidebar();
        $resProfileCompanies = MasterProfileCompany::all();
        return view('Admin.dataProfileCompany', [
            "sidebars" => $resData,
            "companies" => $resProfileCompanies,
        ]);
    }
    public function SettingService()
    {
        $resData = $this->GetSidebar();
        $resServices = DataService::all();
        return view('Admin.dataService', [
            "sidebars" => $resData,
            "services" => $resServices,
        ]);
    }
    public function InsertDetailCompany(Request $request)
    {
        try {
            $myData = $this->GenerateId("DPC", "detailcompany");
            $resInsert = DB::table('detailcompany')->insert([
                            'Kode' => $myData[0]->NewId,
                            'KodeCompany' => $request->post('KodeDetail'),
                            'Name' => $request->post('NameDetail'),
                            'Icon' => $request->post('IconDetail'),
                            'Link' => $request->post('LinkDetail')
                        ]);   
            if( $resInsert )
            {
                return \Redirect::back();
            }
            else 
            {
                return \Redirect::back()->withErrors('Ada Kesalahan Input Data, Coba Lagi!');
            }
        } catch (JWTException $e) {
            return \Redirect::back()->withErrors('Ada Kesalahan Jaringan, Coba Lagi!');
        }
    }
    public function InsertService(Request $request)
    {
        try {
            if($request->filled('Kode'))
            {
                $resInsert = DB::table('masterservice')
                            ->where('Kode',$request->post('Kode'))
                            ->update([
                                'ServiceName' => $request->post('ServiceName'),
                                'DetailService' => $request->post('DetailService'),
                                'Icon' => $request->post('Icon'),
                                'LinkDetail' => $request->post('LinkDetail')
                            ]);
            }
            else
            {
                $myData = $this->GenerateId("MS", "masterservice");
                $resInsert = DB::table('masterservice')->insert([
                                'Kode' => $myData[0]->NewId,
                                'ServiceName' => $request->post('ServiceName'),
                                'DetailService' => $request->post('DetailService'),
                                'Icon' => $request->post('Icon'),
                                'LinkDetail' => $request->post('LinkDetail')
                            ]);
            }
            if( $resInsert )
            {
                return \Redirect::back();
            }
            else 
            {
                return \Redirect::back()->withErrors('Ada Kesalahan Input Data, Coba Lagi!');
            }
        } catch (JWTException $e) {
            return \Redirect::back()->withErrors('Ada Kesalahan Jaringan, Coba Lagi!');
        }
    }
    public function InsertSettingCompany(Request $request)
    {
        try {

            if($request->filled('Kode'))
            {
                $resInsert = DB::table('masterprofilecompany')
                            ->where('Kode',$request->post('Kode'))
                            ->update([
                                'CompanyName' => $request->post('CompanyName'),
                                'Owner' => $request->post('Owner'),
                                'TagLine' => $request->post('TagLine'),
                                'Icon' => $request->post('Icon'),
                                'AboutUs' => $request->post('AboutUs')
                            ]);
            }            
            else 
            {
                $myData = $this->GenerateId("MPC", "masterprofilecompany");
                $resInsert = DB::table('masterprofilecompany')->insert([
                                'Kode' => $myData[0]->NewId,
                                'CompanyName' => $request->post('CompanyName'),
                                'Owner' => $request->post('Owner'),
                                'TagLine' => $request->post('TagLine'),
                                'Icon' => $request->post('Icon'),
                                'AboutUs' => $request->post('AboutUs')
                            ]);
            }
            if( $resInsert )
            {
                return \Redirect::back();
            }
            else 
            {
                return \Redirect::back()->withErrors('Ada Kesalahan Input Data, Coba Lagi!');
            }
            
        } catch (JWTException $e) {
            return \Redirect::back()->withErrors('Ada Kesalahan Jaringan, Coba Lagi!');
        }
    }
    public function GetServiceCompany(Request $request)
    {
        $kodeService = $request->post('Kode');  
        $resService = DataService::all()->where('Kode', '=',$kodeService)->first();
        echo json_encode($resService);
    }
    public function GetProfileCompany(Request $request)
    {
        $kodeCompany = $request->post('Kode');  
        $resCompany = MasterProfileCompany::all()->where('IsActive', '=', 1)
                                                ->where('Kode', '=',$kodeCompany)
                                                ->first();

        echo json_encode($resCompany);
    }
    public function SetActive(Request $request)
    {
        $retData = DB::statement("UPDATE ".$request->Table." SET IsActive = (
            SELECT (!IsActive) IsActive FROM ".$request->Table." WHERE Kode = '".$request->Kode."' ) 
            WHERE Kode = '".$request->Kode."'");

        if($retData)
        {
            return \Redirect::back();
        }
        else
        {
            return \Redirect::back()->withErrors('Ada Kesalahan, Coba Lagi!'); 
        }
    }
    public function InsertDataStaff(Request $request)
    {
        try {
            $myData = $this->GenerateId("ST", "masterstaff");
            
            $resInsert = DB::table('masterstaff')->insert([
                            'Kode' => $myData[0]->NewId,
                            'StaffName' => $request->post('Username'),
                            'password' => $request->post('Password'),
                            'Phone' => $request->post('Phone'),
                            'Email' => $request->post('Email'),
                            'Address' => $request->post('Address'),
                            'Position' => $request->post('Position')
                        ]);
            if( $resInsert )
            {
                return \Redirect::back();
            }
            else 
            {
                return \Redirect::back()->withErrors('Ada Kesalahan Input Data, Coba Lagi!');
            }
            
            
        } catch (JWTException $e) {
            return \Redirect::back()->withErrors('Ada Kesalahan Jaringan, Coba Lagi!');
        }
    }
    protected function GenerateId($Kode, $Table)
    {
        $resData = DB::select("SELECT IF( 
                                (
                                    SELECT COUNT(Kode) FROM ".$Table." 
                                    WHERE CONVERT(CreateDate, DATE) = CURDATE() AND IFNULL(IsActive,0) = 1 
                                ) > 0, 	
                                (
                                    SELECT	CONCAT('".$Kode."', '-', date_format(curdate(), '%Y%m%d'), '-', LPAD(CONVERT( CONVERT(
                                                        REPLACE(Kode,CONCAT('".$Kode."', '-', date_format(curdate(), '%Y%m%d'), '-'), '')
                                                        , INT) + 1, CHAR(100)), 4, 0) ) NewKode FROM ".$Table."
                                                    WHERE CONVERT(CreateDate, DATE) = CURDATE() AND IFNULL(IsActive,0) = 1		
                                ),
                                (
                                    SELECT CONCAT('".$Kode."', '-', date_format(curdate(), '%Y%m%d'), '-', LPAD(1, 4, 0))
                                )				
                            ) NewId" );
        return $resData;
    }

    public function Logout(Request $request)
    {
        $request->session()->flush();
        return redirect('/Login');
    }

    public function DataClient()
    {
        $resData = $this->GetSidebar();
        $resClients = Clients::all();
        return view('Admin.dataClient', [
            "sidebars" => $resData,
            "clients" => $resClients,
        ]);
    }
    public function InsertClient(Request $request)
    {
        try {
            $file = $request->file('Logo');
            $path = 'assets\img\clients';
            $resultUpload = $file->move($path,$file->getClientOriginalName());

            try {
                $myData = $this->GenerateId("MC", "masterclient");
                
                $resInsert = DB::table('masterclient')->insert([
                                'Kode' => $myData[0]->NewId,
                                'ClientName' => $request->post('ClientName'),
                                'Address' => $request->post('Address'),
                                'Phone' => $request->post('Phone'),
                                'NPWP' => $request->post('NPWP'),
                                'Email' => $request->post('Email'),
                                'Logo' => $file->getClientOriginalName()
                            ]);
                if( $resInsert )
                {
                    return \Redirect::back();
                }
                else 
                {
                    return \Redirect::back()->withErrors('Ada Kesalahan Input Data, Coba Lagi!');
                }
                
                
            } catch (JWTException $e) {
                return \Redirect::back()->withErrors('Ada Kesalahan Jaringan, Coba Lagi!');
            }

        }catch (Throwable $e) {
            return \Redirect::back()->withErrors('Ada Kesalahan Jaringan, Coba Lagi!');
        }

    }

}