@extends('app')

@section('content')
<aside class="w-64 bg-gray-100 p-4 space-y-4">
    <nav class="flex flex-col space-y-2">
        <a href="{{route ('admin.customers')}}" class="hover:underline">klanten</a>
        <a href="{{route ('buy')}}" class="hover:underline">Uren kopen</a>
    </nav>
</aside>
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
<script id="old-data" type="application/json">
    {!! json_encode(old()) !!}
</script>

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
