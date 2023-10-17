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

    //with csrf data
    Route::post('/InsertDataStaff', [AdminController::class, 'InsertDataStaff'])->name('InsertDataStaff')->middleware('csrf');
    Route::post('/InsertSettingCompany', [AdminController::class, 'InsertSettingCompany'])->name('InsertSettingCompany')->middleware('csrf');
    Route::post('/GetProfileCompany', [AdminController::class, 'GetProfileCompany'])->name('GetProfileCompany')->middleware('csrf');
    Route::post('/InsertDetailCompany', [AdminController::class, 'InsertDetailCompany'])->name('InsertDetailCompany')->middleware('csrf');
    Route::post('/InsertService', [AdminController::class, 'InsertService'])->name('InsertService')->middleware('csrf');
    Route::post('/GetServiceCompany', [AdminController::class, 'GetServiceCompany'])->name('GetServiceCompany')->middleware('csrf');
    Route::post('/InsertClient', [AdminController::class, 'InsertClient'])->name('InsertClient')->middleware('csrf');
});

Route::get('/Login', [AdminController::class, 'Login'])->name('login');
Route::post('/LoginStaff', [AdminController::class, 'LoginStaff'])->name('LoginStaff');