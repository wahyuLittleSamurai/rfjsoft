<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\DataStaff;
use Session;
use Validator;


class AdminController extends Controller
{
    protected function GetSidebar()
    {
        $resTmp = DB::select("select * from mastersidebar");
        return json_encode($resTmp);
        
    }
    public function Login()
    {
        return view('Admin.login', [
            "sidebars" => null,
        ]);
    }
    public function LoginStaff()
    {
        $credentials = $request->only('Username', 'Password');
        
        $rules = [
            'Username' => 'required|email',
            'Password' => 'required',
        ];

        $validator = Validator::make($credentials, $rules);
        if($validator->fails()) {
            return \Redirect::back()->withErrors($validator);
        }
        //sampai sini males ngerjain sudah
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
    public function InsertDataStaff(Request $request)
    {
        try {
            $myData = $this->GenerateId("ST", "masterstaff");
            $resInsert = DB::table('masterstaff')->insert([
                            'Kode' => $myData[0]->NewKode,
                            'Username' => $request->post('Username'),
                            'Password' => $request->post('Password'),
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

}