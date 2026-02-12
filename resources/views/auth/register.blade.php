@extends('layouts.app')
@section('title', 'Inscription')
@section('page_title', 'Créer un compte')
@section('content')

    <div class="stardew-form">

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div>
                <label for="first_name">Prénom :</label>
                <input type="text" id="first_name" name="first_name" value="{{ old('first_name') }}" required autofocus>
                @error('first_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="last_name">Nom :</label>
                <input type="text" id="last_name" name="last_name" value="{{ old('last_name') }}" required>
                @error('last_name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password_confirmation">Confirmez le mot de passe :</label>
                <input type="password" id="password_confirmation" name="password_confirmation" required>
            </div>

            <div>
                <button type="submit" class="stardew-button">S'inscrire</button>
            </div>

            <p style="margin-top:10px; text-align:center;">
                Déjà un compte ? <a href="{{ route('login') }}">Connectez-vous</a>
            </p>
        </form>
    </div>

@endsection
