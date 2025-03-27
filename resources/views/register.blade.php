@extends('app')

@section('content')
<!-- allemaal AI generated want ik ben lui en dit is test purposes anyway -->
<form action="{{ route('customers.store') }}" method="POST" class="max-w-md mx-auto p-6 bg-white shadow-md rounded-lg">
    @csrf

    <h2 class="text-xl font-semibold mb-4">Register as a Customer</h2>

    <!-- Name -->
    <label class="block mb-2 text-sm font-medium text-gray-700">Full Name</label>
    <input type="text" name="name" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">

    <!-- Email -->
    <label class="block mt-4 mb-2 text-sm font-medium text-gray-700">Email Address</label>
    <input type="email" name="email" required class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">

    <!-- Phone -->
    <label class="block mt-4 mb-2 text-sm font-medium text-gray-700">Phone Number</label>
    <input type="text" name="phone" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">

    <!-- Company Name (Optional) -->
    <label class="block mt-4 mb-2 text-sm font-medium text-gray-700">Company Name (optional)</label>
    <input type="text" name="company_name" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">

    <h3 class="text-lg font-semibold mt-6">Purchase Maintenance Card</h3>

    <!-- Total Hours -->
    <label class="block mt-4 mb-2 text-sm font-medium text-gray-700">Total Hours</label>
    <input type="number" name="total_hours" required min="1" class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:ring focus:ring-blue-300">

    <button type="submit" class="mt-6 w-full bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg hover:bg-blue-600">
        Register & Purchase
    </button>
</form>

@endsection