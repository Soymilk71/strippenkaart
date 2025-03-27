<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MaintenanceCard extends Model {
    protected $fillable = [
        'customer_id',
        'total_hours',
        'purchase_date',
        'status',
    ];
    public function customer() {
        return $this->belongsTo(Customer::class);
    }

    public function logs() {
        return $this->hasMany(MaintenanceLog::class);
    }

    public function getRemainingHoursAttribute() {
        $usedHours = $this->logs()->sum('hours_logged');
        return $this->total_hours - $usedHours;
    }
}