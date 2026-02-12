@extends('layouts.app')

@section('title', 'Mon profil')
@section('page_title', 'Mon profil')

@section('content')
    <div class="profile-page">
        <h2>Bienvenue {{ $user->first_name }} {{ $user->last_name }}</h2>

        <p><strong>Email :</strong> {{ $user->email }}</p>

        @auth
            @if (auth()->user()->is_admin)
                <a href="{{ route('admin.dashboard') }}" class="stardew-button">
                    Accéder au tableau de bord
                </a>
            @endif
        @endauth

        <p>Ma page profil en construction…</p>
    </div>
@endsection
