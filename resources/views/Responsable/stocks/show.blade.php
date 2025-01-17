@extends('layout') 
@section('content')
 
<div class="row mb-4"> 
    <div class="col-lg-12"> 
        <div class="d-flex justify-content-between align-items-center">
            <h2> Afficher le stock</h2> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.stock.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row mb-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <p><strong>Numéro: </strong> {{ $stock->id }} </p>
        </div> 
    </div> 
     
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <p><strong>Nom du produit: </strong> {{ $stock->produit->nom }} </p>
        </div> 
    </div>
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <p><strong>Quantité de stock: </strong> {{ $stock->quantite }} </p>
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <p><strong>Localisation: </strong> {{ $stock->pointVvente->nom }} </p>
        </div>
    </div>
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <p><strong>Entrepôt: </strong> {{ $stock->pointVvente->nom }} </p>
        </div>
    </div>
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <p><strong>Point de vente: </strong> {{ $stock->pointVvente->nom }}</p> 
        </div>
    </div> 
</div> 
@endsection