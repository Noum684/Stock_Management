@extends('layout') 
@section('content')
 
<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2> Afficher le stock</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.stock.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row g-3"> 
    <div class="col-md-6"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $stock>id }} 
        </div> 
    </div> 
     
    <div class="col-md-6> 
        <div class="form-group"> 
            <strong>Nom du produit: </strong> {{ $stock->produit_id }} 
        </div> 
    </div>
    <div class="col-12"> 
        <div class="form-group"> <strong>Quantité de stock: </strong> {{ $stock->quantite }} 
        </div> 
    </div> 
    <div class="col-12"> 
        <div class="form-group"> 
            <strong>Localisation: </strong> {{ $stock->point_vente_id }} 
        </div>
    </div> 
</div> 
@endsection