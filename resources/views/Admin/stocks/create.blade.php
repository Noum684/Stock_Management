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
    <div class="row mb-3">
        
        <div class="col-12 mb-3">
            <<div class="form-group">
                <label for="produit_id"><strong>Nom du produit:</strong></label>
                @if($produits->isEmpty())
                    <p class="text-danger">Aucun produit disponible.</p>
                @else
                    <select name="produit_id" id="produit_id" class="form-select">
                        <option value="">-- Sélectionnez un produit --</option>
                        @foreach($produits as $produit)
                            <option value="{{ $produit->produit_id }}" {{ old('produit_id') == $produit->produit_id ? 'selected' : '' }}>
                                {{ $produit->nom }}
                            </option>
                        @endforeach
                    </select>
                @endif
            </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Quantité disponible:</strong>
                <input type="number" name="quantite" class="form-control" placeholder="Saisir la quantite">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <label for="categorie_id">Localisation</label>
                <select name="poinVente_id" id="poinVente_id" class="form-control" >
                    <option value="">-- Sélectionnez un point de vente --</option>
                    @foreach($pointVentes as $pointVente)
                        <option value="{{ $poinVente->id }}">{{ $poinVente->adresse }}</option>
                    @endforeach
                </select>
    </div>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <strong>Seuil:</strong>
            <input type="text" name="seuil_m" class="form-control" placeholder="Saisir la quantite">
        </div>
    </div>

    <div class="row">
        <div class="col-12 ">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>
@endsection
