<?php

namespace App\Http\Controllers;

use App\Models\Strip; 
use Illuminate\Http\Request;

class BuyController extends Controller
{
    public function buy()
    {
        return view('buy');
    }

    public function store(Request $request)
    {
        $request->validate([
            'customer'    => 'required',
            'type'        => 'required',
            'date'        => 'required',
            'hours'       => 'nullable|integer|min:0',
            'minutes'     => 'nullable|integer|in:0,15,30,45',
            'title'       => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'jira'        => 'nullable|string',
        ]);


    $klant = \App\Models\Klanten::find($request->customer);
    $urenInMinuten = ((int) $request->hours * 60) + (int) $request->minutes;
    $nieuweUren = $klant->aantal_uren;

    if ($request->type === 'kopen') {
        $nieuweUren += $urenInMinuten;
        $klant->aantal_uren = $nieuweUren;
        $klant->save();
    }

    if ($request->type === 'spenderen') {
        if ($klant->aantal_uren < $urenInMinuten) {
            return redirect()->back()->with('error', 'Niet genoeg uren beschikbaar.');
        }
        $nieuweUren -= $urenInMinuten;
        $klant->aantal_uren = $nieuweUren;
        $klant->save();
    }
    
    Strip::create([
        'klant_id' => $klant->id,
        'date'     => $request->date,
        'type'     => $request->type,
        'uren'     => $urenInMinuten,
        'uren_na_submit' => $nieuweUren,
        'titel'    => $request->title,
        'omschrijving' => $request->description,
        'jira_link' => $request->jira,
    ]);
    
    }
}


