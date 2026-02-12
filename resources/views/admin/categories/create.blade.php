@extends('layouts.admin')

@section('title', 'Créer une catégorie - Admin')

@section('content')

    <h1>Créer une nouvelle catégorie</h1>

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
        <form action="{{ route('admin.categories.store') }}" method="POST">
            @csrf

            <div>
                <label for="name">Nom de la catégorie</label>
                <input type="text" id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="slug">Slug</label>
                <input type="text" id="slug" name="slug" value="{{ old('slug') }}">
                @error('slug')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label for="description">Description</label>
                <textarea id="description" name="description">{{ old('description') }}</textarea>
                @error('description')
                    <div class="error">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="stardew-button">Créer</button>
        </form>
    </div>

    <a href="{{ route('admin.categories.index') }}" class="stardew-button" style="margin-top: 15px; display:inline-block;">
        Retour à la liste
    </a>

@endsection
