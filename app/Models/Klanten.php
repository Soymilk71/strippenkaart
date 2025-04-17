<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klanten extends Model
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

}
