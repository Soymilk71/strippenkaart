@extends('app')
@section('content')
<div class="flex flex-grow justify-center m-6  items-center" >
        <div class="login-card">
            <form action="{{route('register')}}" method="POST" 
            class="grid grid-cols-1 mb-2 gap-4">
            @csrf
            <template x-for="error in errors">
                <div>
                    <span x-text="error"></span>
                </div>
            </template>
            <template x-if="messages">
                <div>
                    <span x-text="message"></span>
                </div>
            </template>
            <h1 class="text-3xl block text-center font-semibold">Registreer</h1>
                <!-- Name -->
                <div class="col-span-1">
                    <label for="firstname" class="block font-medium">Voornaam</label>
                    <input type="text" name="firstname" id="firstname" value="{{ old('name')}}"placeholder="Gebruikersnaam"
                    class="login-input">
                </div>
                <div class="col-span-1">
                    <label for="lastname" class="block font-medium">Achternaam</label>
                    <input type="text" name="lastname" id="lastname" value="{{ old('name')}}"placeholder="Achternaam"
                    class="login-input">
                </div>
                <!-- Email -->
                <div class="col-span-1">
                    <label for="email" class="block font-medium">Email Adres</label>
                    <input type="email" name="email" id="email" value="{{ old('email')}}" placeholder="example@example.com"
                    class="login-input">
                </div>
                <div>
                    <!-- Password -->
                    <label for="password" class="block font-medium">Wachtwoord</label>
                    <input type="password" name="password" id="password" placeholder="Wachtwoord"
                    class="login-input">
                </div>
                <div>
                    <!-- Password Confirm-->
                    <label for="password_confirmation" class="block font-medium">Herhaal wachtwoord</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Wachtwoord"
                    class="login-input">
                </div>
                <div>
                    <button type="submit" name="submitlogin" class="login-btn">Verzenden</button>
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