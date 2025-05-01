@extends('app')

@section('content')

<table class="w-full border-collapse border border-gray-300">
            <thead>
                <tr class="bg-gray-100">
                    <th class="border border-gray-300 px-4 py-2 text-left">ID</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Voornaam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Achternaam</th>
                    <th class="border border-gray-300 px-4 py-2 text-left">Laatste transactie</th>

                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="border border-gray-300 px-4 py-2">X</td>
                    <td class="border border-gray-300 px-4 py-2">test</td>
                    <td class="border border-gray-300 px-4 py-2">bob</td>
                    <td class="border border-gray-300 px-4 py-2">-10u</td>
                    <td class="border border-gray-300 px-4 py-2">Bewerk</td>
                </tr>
            </tbody>
        </table>




@endsection