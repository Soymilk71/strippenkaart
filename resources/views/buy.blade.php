@extends('app')

@section('content')

<div class="m-5 p-5">
<form action="/buy" method="POST" class="space-y-6">
    @csrf

    <div class="flex flex-col md:flex-row md:items-center md:gap-6">
        <div class="flex-1">
            <label for="customer" class="block mb-1 font-medium">Klant</label>
            <select name="customer" id="customer" class="form-input w-full">
                <option value="#">test klant A</option>
                <option value="#">test klant B</option>
            </select>
        </div>

        <div class="flex-1 mt-4 md:mt-0">
            <label for="type" class="block mb-1 font-medium">Soort</label>
            <select name="type" id="type" class="form-input w-full">
                <option value="#">Uren kopen</option>
                <option value="#">Uren spenderen</option>
            </select>
        </div>
    </div>

    <div>
        <label for="date" class="block mb-1 font-medium">Datum</label>
        <input type="date" name="date" id="date" class="form-input w-full">
    </div>

    <div class="flex flex-col md:flex-row md:items-end md:gap-6">
        <div class="flex-1">
            <label for="hours" class="block mb-1 font-medium">Aantal gekochte uren</label>
            <input type="number" name="hours" id="hours" class="form-input w-full" placeholder="Uren">
        </div>
        <div class="flex-1 mt-4 md:mt-0">
            <label for="minutes" class="block mb-1 font-medium">Minuten</label>
            <select name="minutes" id="minutes" class="form-input w-full">
                <option value="" disabled selected hidden>Minuten</option>
                <option value="0">0</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="45">45</option> 
            </select>
        </div>
    </div>
    <!-- deze zooi moet pas zichtbaar zijn als je uren spenderen selecteert vvvvvvv -->
    <div>
        <label for="title" class="block mb-1 font-medium">Titel</label>
        <input type="text" name="title" id="title" class="form-input w-full" placeholder="Titel">
    </div>

    <div>
        <label for="description" class="block mb-1 font-medium">Omschrijving</label>
        <textarea name="description" id="description" class="form-input w-full" rows="4" placeholder="Omschrijving"></textarea>
    </div>

    <div>
        <label for="jira" class="block mb-1 font-medium">Jira-link</label>
        <input type="text" name="jira" id="jira" class="form-input w-full" placeholder="Jira-link">
    </div>

    <div class="flex justify-start">
        <button type="submit" class="button-primary">Submit</button>
    </div>
</form>
</div>




@endsection