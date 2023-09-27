<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DataStaff;
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

}