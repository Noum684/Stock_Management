@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Ajouter une commande</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{ route('Admin.commande.index') }}">Retour</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oups! </strong> Il y a eu des problèmes avec votre entrée.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('Admin.commande.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Nom du produit:</strong>
                @if($produits->isEmpty())
                    <p>Aucun produit disponible.</p>
                @else
                    <select name="produit_id" class="form-select">
                        @foreach($produits as $produit)
                            <option value="{{ $produit->id }}">{{ $produit->nom }}</option>
                        @endforeach
                    </select>
                @endif
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Quantité commandée:</strong>
                <input type="number" name="quantite" class="form-control" placeholder="Saisir la quantite de la commande">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Status:</strong>
                <select name="status" class="form-control">
                    <option value="En attente">En attente</option>
                    <option value="Refusée">Refusée</option>
                    <option value="Livrée">Livrée</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="col-12  ">
                <button type="submit" class="btn btn-primary">Enregistrer</button>
            </div>
    </div>
</form>
@endsection
