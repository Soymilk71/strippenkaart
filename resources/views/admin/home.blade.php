@extends('app')

@section('content')

<body class="min-h-screen flex">
    <aside class="w-64 bg-gray-100 p-4 space-y-4">
        <nav class="flex flex-col space-y-2">
            <a href="{{route ('admin.customers')}}" class="hover:underline">klanten</a>
            <a href="{{route ('buy')}}" class="hover:underline">Uren kopen</a>
        </nav>
    </aside>
</body>

@endsection