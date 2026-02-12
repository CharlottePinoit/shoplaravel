@extends('layouts.admin')

@section('title', 'Liste des catégories - Admin')

@section('content')

    <h1>Liste des catégories</h1>

    @if (session('success'))
        <div class="flash-message flash-success">
            <strong>{{ session('success') }}</strong>
        </div>
    @endif

    @if (session('error'))
        <div class="flash-message flash-error">
            <strong>{{ session('error') }}</strong>
        </div>
    @endif

    <a href="{{ route('admin.categories.create') }}" class="stardew-button" style="margin-bottom: 15px; display:inline-block;">
        + Ajouter une catégorie
    </a>

    <div class="grid grid-cols-3 gap-4">
        @foreach ($categories as $category)
            <div class="product-card" style="width: 200px; padding:10px;">
                <div class="product-name">{{ $category->name }}</div>
                <div style="margin-top: 10px;">
                    <a href="{{ route('admin.categories.show', $category) }}" class="stardew-button">Voir</a>
                    <a href="{{ route('admin.categories.edit', $category) }}" class="stardew-button">Modifier</a>
                    <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                        style="display:inline-block;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button"
                            onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

@endsection
