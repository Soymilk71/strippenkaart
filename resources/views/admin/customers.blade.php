@extends('app')

@section('content')
<aside class="w-64 bg-gray-100 p-4 space-y-4">
    <nav class="flex flex-col space-y-2">
        <a href="{{route ('admin.customers')}}" class="hover:underline">klanten</a>
        <a href="{{route ('buy')}}" class="hover:underline">Uren kopen</a>
    </nav>
</aside>

<div class="p-6">
        <h1 class="text-2xl font-bold mb-4">Alle klanten</h1>

        <table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Voornaam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Achternaam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Aantal uren</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Bewerken</th>
                </tr>
            </thead>
            <tbody>
                @foreach($klanten as $klant)
                    <tr>
                        <td class="border border-gray-300 px-4 py-2">{{ $klant->id }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $klant->voornaam }}</td>
                        <td class="border border-gray-300 px-4 py-2">{{ $klant->achternaam }}</td>
                        <td class="border border-gray-300 px-4 py-2">
                            {{minutesToHours($klant->aantal_uren) }}
                        </td>
                        <td class="border border-gray-300 px-4 py-2">
                        <a href="{{ route('klanten.geschiedenis', $klant->id) }}" class="text-blue-500 hover:underline">Bewerk</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection