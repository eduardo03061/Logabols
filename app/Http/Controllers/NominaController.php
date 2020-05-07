<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NominaController extends Controller
{
 
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index()
    {
        return view('Nomina.list');
    }
    public function create(){
        return view('Nomina.create');
    }
    public function storage(Request $request){
        dd($request);
    }
}
