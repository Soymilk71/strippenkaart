<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\MaintenanceCard;
use Illuminate\Http\Request;

class CustomerController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:customers,email',
            'phone' => 'nullable|string|max:20',
            'company_name' => 'nullable|string|max:255',
            'total_hours' => 'required|integer|min:1',
        ]);

        $customer = Customer::create($request->only('name', 'email', 'phone', 'company_name'));

        MaintenanceCard::create([
            'customer_id' => $customer->id,
            'total_hours' => $request->total_hours,
            'purchase_date' => now(),
            'status' => 'active',
        ]);

        return redirect()->back()->with('success', 'Customer registered and maintenance card purchased!');
    }
}
