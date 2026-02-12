@extends('layouts.admin')

@section('title', 'Gestion des utilisateurs - ')

@section('page_title', 'Utilisateurs')

@section('content')
    @if (session('success'))
        <div class="flash-message flash-success">{{ session('success') }}</div>
    @endif

    <a href="{{ route('admin.users.create') }}" class="stardew-button">+ Ajouter un utilisateur</a>

    <div class="grid grid-cols-1 gap-4 mt-4">
        @foreach ($users as $user)
            <div class="product-card">
                <p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
                <p>Email: {{ $user->email }}</p>
                <p>Admin: {{ $user->is_admin ? 'Oui' : 'Non' }}</p>

                <a href="{{ route('admin.users.show', $user) }}" class="stardew-button">Voir</a>
                <a href="{{ route('admin.users.edit', $user) }}" class="stardew-button">Modifier</a>

                <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="delete-button"
                        onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
                </form>
            </div>
        @endforeach
    </div>
@endsection
