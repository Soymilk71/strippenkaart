@extends('app')

@section('content')

<div>
    <form action="#" method="POST">
        @csrf
        <label for="customer">Klant</label>
        <select name="customer" id="customer" class="form-input">
            <option value="#">Klant A</option>
            <option value="#">Klant B</option>
        </select>
        <label for="type">Soort</label>
        <select name="type" id="type">
            <option value="#">Uren kopen</option>
            <option value="#">Uren spenderen</option>
        </select>
        <label for="date">Datum</label>
        <input type="date" name="date" id="date">
        <label for="hours">Aantal gemaakte uren</label>
        <input type="number" name="hours" id="hours" class="form-input" placeholder="Uren">
        <label for="minutes"></label>
        <select name="minutes" id="minutes">
            <option value="#">0</option>
            <option value="#">15</option>
            <option value="#">30</option>
            <option value="#">45</option>
        </select>
        <label for="Title">Titel</label>
        <input type="text" name="title" id="title" class="form-input" placeholder="Titel">
        <label for="description">Omschrijving</label>
        <textarea name="description" id="description" class="form-input" placeholder="Omschrijving"></textarea>
        <label for="Jira">Jira-link</label>
        <input type="text" name="jira" id="jira" class="form-input" placeholder="Jira-link">
        <label for="submit"></label>
        <button>Submit</button>
    </form>

</div>

@endsection