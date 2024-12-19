@extends('layout') 
@section('content')
 
<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2> Afficher la commande</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.commande.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $commande->id }} 
        </div> 
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> <strong>Nom du produit: </strong> {{ $commande->produit_id }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> <strong>Quantité commandée: </strong> {{ $commande->quantite }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Status: </strong> {{ $commande->status }} 
        </div>
    </div> 
</div> 
@endsection