@extends('layout') 
@section('content')
 
<div class="row mb-4"> 
    <div class="col-lg-12"> 
        <div class="d-flex justify-content-between align-items-center">
            <h2> Afficher le produit</h2> 
            <a class="btn btn-outline-primary" href="{{ route('produit.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row mb-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $produit->id }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> <strong>Nom: </strong> {{ $produit->nom }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Categorie: </strong> {{ $produit->categorie_id }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Description : </strong> {{ $produit->description }} 
        </div>
    </div>
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Prix Unitaire: </strong> {{ $produit->prix }} 
        </div>
    </div>
</div> 
@endsection