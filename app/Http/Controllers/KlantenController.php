<?php

namespace App\Http\Controllers;

use App\Models\Klanten;
use Illuminate\Http\Request;

class KlantenController extends Controller
{
    //
    public function index(){

        if(!auth()->user()->is_admin){
            return redirect()->route('home')->with('error', 'Je hebt geen toegang tot deze pagina.');
        }

        $klanten = Klanten::all();
        return view('admin.customers', compact('klanten'));
        
    }
    public function geschiedenis($id)
    {
        // Zoek de klant of geef 404
        $klant = Klanten::with(['strippen' => fn($q) => $q->orderBy('date', 'desc')])->findOrFail($id);


        $lastTransaction= $klant->aankopen()->latest('date')->first();


        return view('admin.geschiedenis', compact(
            'klant',
            'lastTransaction'

        ));
    }
}
