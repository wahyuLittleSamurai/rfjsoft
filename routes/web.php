<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\rjsoft;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', [rjsoft::class, 'index'])->name('index'); 
Route::get('/DetailService', [rjsoft::class, 'detailService'])->name('DetailService');
Route::post('/InsertMessageCust', [rjsoft::class, 'InsertMessageCust'])->name('InsertMessageCust')->middleware('csrf');


Route::group(['middleware' => ['usersession']], function() {
    /* ROUTE FOR ADMIN */
    Route::get('/DashAdmin', [AdminController::class, 'DashAdmin'])->name('DashboardAdmin'); 
    Route::get('/DataStaff', [AdminController::class, 'DataStaff'])->name('DataStaff'); 
    Route::get('/SettingCompany', [AdminController::class, 'SettingCompany'])->name('SettingCompany'); 
    Route::get('/test/{Kode}/{Table}', [AdminController::class, 'GenerateId']); 
    Route::get('/Logout', [AdminController::class, 'Logout'])->name('Logout'); 
    Route::get('/SetActive/{Kode}/{Table}', [AdminController::class, 'SetActive'])->name('SetActive'); 
    Route::get('/SettingService', [AdminController::class, 'SettingService'])->name('SettingService'); 
    Route::get('/DataClient', [AdminController::class, 'DataClient'])->name('DataClient'); 
    Route::get('/SettingPortofolio', [AdminController::class, 'SettingPortofolio'])->name('SettingPortofolio'); 
    Route::get('/SettingTopMenu', [AdminController::class, 'SettingTopMenu'])->name('SettingTopMenu'); 

    //with csrf data
    Route::post('/InsertDataStaff', [AdminController::class, 'InsertDataStaff'])->name('InsertDataStaff')->middleware('csrf');
    Route::post('/InsertSettingCompany', [AdminController::class, 'InsertSettingCompany'])->name('InsertSettingCompany')->middleware('csrf');
    Route::post('/GetProfileCompany', [AdminController::class, 'GetProfileCompany'])->name('GetProfileCompany')->middleware('csrf');
    Route::post('/InsertDetailCompany', [AdminController::class, 'InsertDetailCompany'])->name('InsertDetailCompany')->middleware('csrf');
    Route::post('/InsertService', [AdminController::class, 'InsertService'])->name('InsertService')->middleware('csrf');
    Route::post('/GetServiceCompany', [AdminController::class, 'GetServiceCompany'])->name('GetServiceCompany')->middleware('csrf');
    Route::post('/InsertClient', [AdminController::class, 'InsertClient'])->name('InsertClient')->middleware('csrf');
    Route::post('/GetDataClient', [AdminController::class, 'GetDataClient'])->name('GetDataClient')->middleware('csrf');
    Route::post('/InsertPortofolio', [AdminController::class, 'InsertPortofolio'])->name('InsertPortofolio')->middleware('csrf');
    Route::post('/GetDataPortofolio', [AdminController::class, 'GetDataPortofolio'])->name('GetDataPortofolio')->middleware('csrf');
    Route::post('/InsertTopMenu', [AdminController::class, 'InsertTopMenu'])->name('InsertTopMenu')->middleware('csrf');
    Route::post('/GetDataTopMenu', [AdminController::class, 'GetDataTopMenu'])->name('GetDataTopMenu')->middleware('csrf');
     
});

Route::get('/Login', [AdminController::class, 'Login'])->name('login');
Route::get('/StaffResetPass', [AdminController::class, 'StaffResetPass'])->name('StaffResetPass');
Route::post('/LoginStaff', [AdminController::class, 'LoginStaff'])->name('LoginStaff');
Route::post('/ActionStaffResetPass', [AdminController::class, 'ActionStaffResetPass'])->name('ActionStaffResetPass');