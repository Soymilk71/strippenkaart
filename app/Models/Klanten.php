<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Klanten extends User
{
    use HasFactory;
    
    protected $table = 'klanten';

    protected $fillable = [
        'voornaam',
        'achternaam',
        'email',
        'password',
        'aantal_uren',
        'is_admin',
        'bedrijf',
        'remember_token',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function strippen()
    {
        return $this->hasMany(Strip::class, 'klant_id');
    }

    public function aankopen()
    {
        return $this->strippen()->where('type', 'kopen');
    }

}
