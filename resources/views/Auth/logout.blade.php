@extends('layout')

@section('content')
<div class="container text-center">
    <h2>Déconnexion</h2>
    <p>Voulez-vous vraiment vous déconnecter ?</p>

    <!-- Formulaire de déconnexion -->
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-danger">Se déconnecter</button>
    </form>

    <a href="{{ route('dashboard') }}" class="btn btn-secondary mt-3">Annuler</a>
</div>
@endsection
