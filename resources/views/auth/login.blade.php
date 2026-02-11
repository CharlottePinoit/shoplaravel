@extends('layouts.app')
@section('title', 'Connexion')
@section('page_title', 'Connexion')
@section('content')

    <div class="stardew-form">

        <form method="POST" action="{{ route('login') }}">

            @csrf


            <div>
                <label for="email">Adresse e-mail</label>
                <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>
                @error('email')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label for="password">Mot de passe</label>
                <input type="password" id="password" name="password" required>
                @error('password')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <div>
                <label>
                    <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}>
                    Se souvenir de moi
                </label>
            </div>

            <button type="submit" class="stardew-button">Connexion</button>

            <p>Pas encore de compte ? <a href="{{ route('register') }}">Inscrivez-vous ici</a></p>

        </form>

    </div>

@endsection
