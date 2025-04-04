@extends('app')

@section('content')

<div>
<form action="/buy" method="POST">
    @csrf
    <div class="grid grid-cols-6 py-1 gap-4">
        <label for="customer" class="col-span-1">Klant</label>
        <select name="customer" id="customer" class="form-input col-span-2">
            <option value="#">For loop met alle klanten</option>
            <option value="#">Klant B</option>
        </select>

        <label for="type">Soort</label>
        <select name="type" id="type" class="form-input col-span-1">
            <option value="#">Uren kopen</option>
            <option value="#">Uren spenderen</option>
        </select><br>

        <label for="date">Datum</label>
        <input type="date" name="date" id="date" class="form-input col-span-2">

        <div class="col-span-full grid grid-cols-6 gap-4">
            <label for="hours" class="col-span-1">Aantal gekochte uren</label>
            <input type="number" name="hours" id="hours" class="form-input col-span-1" placeholder="Uren">
            <select name="minutes" id="minutes" class="form-input col-span-1" >
                <option value="" disabled selected hidden>Minuten</option>
                <option value="0">0</option>
                <option value="15">15</option>
                <option value="30">30</option>
                <option value="45">45</option> 
            </select>
        </div>
        <div class="col-span-full">
            <button type="submit" class="button-primary">Submit</button>
        </div>
    </div>
</form>

</div>




@endsection