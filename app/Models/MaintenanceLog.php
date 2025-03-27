<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceLog extends Model {
    protected $fillable = [
        'maintenance_card_id',
        'hours_logged',
        'log_date',
        'customer_id',
        'description',
    ];
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function maintenanceCard() {
        return $this->belongsTo(MaintenanceCard::class);
    }
}