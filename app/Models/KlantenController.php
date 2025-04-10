<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlantenController extends Model
{
    use HasFactory;

    function buy()
    {
        return view('buy');
    }
}
