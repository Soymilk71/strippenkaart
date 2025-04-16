<?php

namespace App\Http\Controllers;

use App\Models\Klanten;
use Illuminate\Http\Request;

class KlantenController extends Controller
{
    //
    public function index(){
        $klanten = Klanten::all();
        return view('customers', compact('klanten'));
        
    }
}
