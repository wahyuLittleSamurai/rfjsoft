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


/* ROUTE FOR ADMIN */
Route::get('/DashAdmin', [AdminController::class, 'DashAdmin'])->name('DashboardAdmin'); 
Route::get('/DataStaff', [AdminController::class, 'DataStaff'])->name('DataStaff'); 
Route::get('/test', [AdminController::class, 'GetSidebar']); 