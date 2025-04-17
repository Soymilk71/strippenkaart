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
    public function geschiedenis($id)
    {
        // Zoek de klant of geef 404
        $klant = Klanten::findOrFail($id);

        // Haal alle 'strippen' op, gesorteerd op datum (nieuwst eerst)
        $strippen = $klant
            ->strippen()
            ->orderBy('date', 'desc')
            ->get();

        // Optioneel: samenvattingen
        $totaalGekocht = $strippen->where('type', 'koop')->sum('uren');
        $totaalGebruikt = $strippen->where('type', 'gebruik')->sum('uren');

        return view('klanten.geschiedenis', compact(
            'klant',
            'strippen',
            'totaalGekocht',
            'totaalGebruikt'
        ));
    }

}
