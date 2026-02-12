@extends('layouts.admin')

@section('title', 'Détails catégorie - Admin')

@section('content')

    <h1>Détails de la catégorie : {{ $category->name }}</h1>

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

    <div class="product-card" style="width: 250px; margin: 20px auto; padding:10px;">
        <div class="product-name">{{ $category->name }}</div>
        <div style="margin-top:10px;">
            <a href="{{ route('admin.categories.edit', $category) }}" class="stardew-button">Modifier</a>

            <form action="{{ route('admin.categories.destroy', $category) }}" method="POST" style="display:inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="delete-button"
                    onclick="return confirm('Supprimer cette catégorie ?')">Supprimer</button>
            </form>
        </div>
    </div>

    <a href="{{ route('admin.categories.index') }}" class="stardew-button"
        style="display:block; text-align:center; margin-top:20px;">
        Retour à la liste
    </a>

@endsection
