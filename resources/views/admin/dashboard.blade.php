@extends('layouts.admin')

@section('title', 'Tableau de bord')

@section('page_title', 'Dashboard Admin')

@section('content')

    @if (session('success'))
        <div class="flash-message flash-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="flash-message flash-error">{{ session('error') }}</div>
    @endif

    <div class="dashboard-stats">
        <div class="stat-card">
            <h2>Produits</h2>
            <p class="stat-count">{{ $productsCount }}</p>
            <a href="{{ route('admin.products.index') }}" class="stardew-button">Gérer les produits</a>
        </div>

        <div class="stat-card">
            <h2>Catégories</h2>
            <p class="stat-count">{{ $categoriesCount }}</p>
            <a href="{{ route('admin.categories.index') }}" class="stardew-button">Gérer les catégories</a>
        </div>

        <div class="stat-card">
            <h2>Utilisateurs</h2>
            <p class="stat-count">{{ $usersCount }}</p>
            <a href="{{ route('admin.users.index') }}" class="stardew-button">Gérer les utilisateurs</a>
        </div>
    </div>

@endsection
