@extends('layouts.admin')


@section('title', 'Détails utilisateur - ')

@section('page_title', 'Détails utilisateur')

@section('content')
    <div class="product-card">
        <p><strong>{{ $user->first_name }} {{ $user->last_name }}</strong></p>
        <p>Email: {{ $user->email }}</p>
        <p>Admin: {{ $user->is_admin ? 'Oui' : 'Non' }}</p>

        <a href="{{ route('admin.users.edit', $user) }}" class="stardew-button">Modifier</a>

        <form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" class="delete-button"
                onclick="return confirm('Supprimer cet utilisateur ?')">Supprimer</button>
        </form>

        <a href="{{ route('admin.users.index') }}" class="stardew-button">Retour à la liste</a>
    </div>
@endsection
