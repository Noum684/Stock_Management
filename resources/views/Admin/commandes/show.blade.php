@extends('layout') 
@section('content')
 
<div class="row mb-4"> 
    <div class="col-lg-12"> 
        <div class="d-flex justify-content-between align-items-center"> 
            <h2> Afficher la commande</h2> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.commande.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row mb-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $commande->id }} 
        </div> 
    </div>
    <div class="col-12 mb-3"> 
        <div class="form-group"> <strong>Nom du produit: </strong> {{ $commande->produit_id }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> <strong>Quantité commandée: </strong> {{ $commande->quantite }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Status: </strong> {{ $commande->status }} 
        </div>
    </div> 
</div> 
@endsection