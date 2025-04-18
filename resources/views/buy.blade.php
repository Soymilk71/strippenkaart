@extends('app')

@section('content')
<div class="m-5 p-5">

@if($errors->any())
    <div class="bg-red-100 text-red-800 p-4 mb-4 rounded">
        <ul>
            @foreach ($errors->all() as $error)
                <li>⚠️ {{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<meta name="csrf-token" content="{{ csrf_token() }}">

<!-- Klanten data in JSON -->
<script id="klanten-data" type="application/json">
    {!! \App\Models\Klanten::all()->toJson() !!}
</script>

<!-- Vue mount punt -->
<div id="app">
    <form-component></form-component>
</div>

@vite(['resources/css/app.css', 'resources/js/app.js'])
</div>
@endsection
