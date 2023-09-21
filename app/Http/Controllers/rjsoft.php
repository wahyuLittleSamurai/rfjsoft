<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class rjsoft extends Controller
{
    public function index()
    {
        return view('home', ["sliding" => true]);
    }
    public function detailService()
    {
        return view('detailService', ["sliding" => false]);
    }
}
