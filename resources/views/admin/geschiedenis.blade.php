@extends('app')

@section('content')
<aside class="w-64 bg-gray-100 p-4 space-y-4">
    <nav class="flex flex-col space-y-2">
        <a href="{{route ('admin.customers')}}" class="hover:underline">klanten</a>
        <a href="{{route ('buy')}}" class="hover:underline">Uren kopen</a>
    </nav>
</aside>
<table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">Datum</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Naam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Totale Uren</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Laatste transactie</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Beschrijving</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Bewerk</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($klant->strippen as $transactie)
                    @php
                        $prefix = $transactie->type === 'kopen' ? '+' : '-';
                    @endphp
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $transactie->created_at->format('d-m-Y H:i') }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{$klant->voornaam}} {{$klant->achternaam}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{minutesToHours($transactie->uren_na_submit)}}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $prefix }}{{ minutesToHours($transactie->uren) }}</td>   
                        <td class="border border-gray-300 px-4 py-2">{{$transactie->titel}}</td>
                        <td class="border border-gray-300 px-4 py-2"><a href="#">nog niks hier</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>




@endsection 