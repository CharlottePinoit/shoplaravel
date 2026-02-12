@extends('layouts.admin')

@section('title', 'Modifier une catégorie - Admin')

@section('content')

    <h1>Modifier la catégorie : {{ $category->name }}</h1>

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

    <div class="stardew-form">
        <form action="{{ route('admin.categories.update', $category) }}" method="POST">
            @csrf
            @method('PUT')

            <div>
                <label for="name">Nom de la catégorie</label>
                <input type="text" id="name" name="name" value="{{ old('name', $category->name) }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="stardew-button">Enregistrer</button>
        </form>
    </div>

    <a href="{{ route('admin.categories.index') }}" class="stardew-button" style="margin-top: 15px; display:inline-block;">
        Retour à la liste
    </a>

@endsection
