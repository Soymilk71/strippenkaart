<?php

namespace App\Models;

use App\Models\MaintenanceCard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Customer extends Model {
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company_name',
        'customer_id',
    ];
    public function maintenanceCards() {
        return $this->hasMany(MaintenanceCard::class);
    }

    public function maintenanceLogs() {
        return $this->hasMany(MaintenanceLog::class);
    }

    public function getRemainingHoursAttribute() {
        $totalCardHours = $this->maintenanceCards()->where('status', 'active')->sum('total_hours');
        $usedHours = $this->maintenanceLogs()->sum('hours_logged');
        return $totalCardHours - $usedHours;
    }
}