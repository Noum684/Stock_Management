@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Ajouter</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{ route('Admin.stock.index') }}">Retour</a>
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

<form action="{{ route('Admin.stock.store') }}" method="POST">
    @csrf
    <div class="row g-3">
        
        <div class="col-md-6">
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
        <div class="col-12">
            <div class="form-group">
                <strong>Quantité disponible:</strong>
                <input type="text" name="quantite" class="form-control" placeholder="Saisir la quantite">
            </div>
        </div>
        <div class="col-12">
            <div class="form-group">
                <strong>Localisation:</strong>
                <select name="poinVente_id" class="form-select">
                    @foreach($pointVentes as $pointVente)
                        <option value="{{ $pointVente->pointeVente_id }}">{{ $pointVente->adresse }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 text-center ">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>
@endsection
