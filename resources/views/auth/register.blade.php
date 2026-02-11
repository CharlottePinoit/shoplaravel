@extends('layouts.app')
@section('title', 'Inscription')
@section('page_title', 'Créer un compte')
@section('content')

    <div class="stardew-form">

        <form method="POST" action="{{ route('register') }}">

            @csrf

            <div>
                <label for="name">Nom :</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required autofocus>
                @error('name')
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
