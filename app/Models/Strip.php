<?php

namespace App\Models;

use App\Models\Klanten;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Strip extends Model
{
    use HasFactory;
    protected $table = 'strippen';

    protected $fillable = [
        'klant_id',
        'date',
        'type',
        'uren',
        'uren_na_submit',
        'titel',
        'omschrijving',
        'jira_link',
    ];

    public function klant()
    {
        return $this->belongsTo(Klanten::class, 'klant_id');
    }

}
