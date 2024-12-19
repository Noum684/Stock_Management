@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Ajouter une commande/h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{ route('commande.index') }}">Retour</a>
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

<form action="{{ route('commande.store') }}" method="POST">
    @csrf
    <div class="row g-3">
        <div class="col-md-6">
            <div class="form-group">
                <strong>Nom du produit:</strong>
                    <select name="produit_id" class="form-control">
                        @foreach($produits as $produit)
                            <option value="{{ $produit->produit_id }}">{{ $produit->nom }} </option>
                        @endforeach
                    </select>
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <strong>Quantité commandée:</strong>
                <input type="number" name="quantite" class="form-control" placeholder="Saisir la quantite de la commande">
            </div>
        </div>
        <div class="col-md-6">
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
        <div class="col-12 text-center">
            <button type="submit" class="btn btn-primary"><a href="">Enregistrer</a></button>
        </div>
    </div>
</form>
@endsection
