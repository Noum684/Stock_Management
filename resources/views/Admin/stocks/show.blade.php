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
            <strong>Numéro: </strong> {{ $stock>id }} 
        </div> 
    </div> 
     
    <div class="col-12 mb-3> 
        <div class="form-group"> 
            <strong>Nom du produit: </strong> {{ $stock->produit_id }} 
        </div> 
    </div>
    <div class="col-12 mb-3"> 
        <div class="form-group"> <strong>Quantité de stock: </strong> {{ $stock->quantite }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Localisation: </strong> {{ $stock->point_vente_id }} 
        </div>
    </div> 
</div> 
@endsection