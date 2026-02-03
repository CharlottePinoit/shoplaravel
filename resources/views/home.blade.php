@extends('layouts.app')
@section('title',$boutique['nom'])

@section('page_title')
Bienvenue au {{ $boutique['nom'] }} !
@endsection


@section('content')
<p>Nous avons actuellement {{ $boutique['produits'] }} produits en stock.</p>

@if($boutique['etat'] === 'ouvert')
<p>La boutique est ouverte, venez nous rendre visite !</p>
<img src="{{ asset('images/boutique_ouverte.png') }}" alt="Boutique ouverte" style="max-width:300px;">
@else
<p>La boutique est fermée pour le moment, revenez plus tard.</p>
<img src="{{ asset('images/boutique_fermee.png') }}" alt="Boutique fermée" style="max-width:300px;">
@endif

@endsection