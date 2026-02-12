@extends('layouts.admin')


@section('title', 'Créer un utilisateur - ')

@section('page_title', 'Créer un utilisateur')

@section('content')
    <form action="{{ route('admin.users.store') }}" method="POST" class="stardew-form">
        @csrf

        <div>
            <label for="first_name">Prénom</label>
            <input type="text" name="first_name" id="first_name" value="{{ old('first_name') }}">
            @error('first_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="last_name">Nom</label>
            <input type="text" name="last_name" id="last_name" value="{{ old('last_name') }}">
            @error('last_name')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="email">Email</label>
            <input type="text" name="email" id="email" value="{{ old('email') }}">
            @error('email')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password">Mot de passe</label>
            <input type="password" name="password" id="password">
            @error('password')
                <div class="error">{{ $message }}</div>
            @enderror
        </div>

        <div>
            <label for="password_confirmation">Confirmer le mot de passe</label>
            <input type="password" name="password_confirmation" id="password_confirmation">
        </div>

        <div>
            <label><input type="checkbox" name="is_admin" {{ old('is_admin') ? 'checked' : '' }}> Administrateur</label>
        </div>

        <button type="submit">Créer</button>
    </form>
@endsection
