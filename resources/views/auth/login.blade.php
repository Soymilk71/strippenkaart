@extends('app')

@section('content')

<div>
    <div>
        <form action="{{route('login')}}" method="POST">
            @csrf
            <h1>Log in</h1>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" placeholder="test@example.com">
            </div>
            <div>
                <label for="password">Wachtwoord</label>
                <input type="password" name="password" id="password" placeholder="pswd123!">
            </div>
            <div>
                <input type="checkbox" name="remember" id="remember">
                    <h2>Vergeet mij niet</h2>
                </input>
            </div>
            <div>
                <button type="submit" name="submitlogin">Login</button>
            </div>
            @if($errors->any())
                    <ul>
                        @foreach($errors->all() as $error)
                            <li class="text-red-700">{{ $error }}</li>
                        @endforeach
                    </ul>
                @endif
        </form>
    </div>
</div>



@endsection