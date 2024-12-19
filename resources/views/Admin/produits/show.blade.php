@extends('layout') 
@section('content')
 
<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2> Afficher le produit</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-primary" href="{{ route('produit.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $produit->id }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> <strong>Nom: </strong> {{ $produit->nom }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Categorie: </strong> {{ $produit->categorie_id }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Prix Unitaire: </strong> {{ $produit->prix }} 
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Description : </strong> {{ $produit->description }} 
        </div>
    </div>
</div> 
@endsection