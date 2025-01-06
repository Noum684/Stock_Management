@extends('layout') 
@section('content')
 
<div class="row mb-4"> 
    <div class="col-lg-12"> 
        <div class="d-flex justify-content-between align-items-center">
            <h2> Afficher le point de vente</h2> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.poinVente.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row mb-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $pointVente->id }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> <strong>Nom: </strong> {{ $pointVnete->nom }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Responsable: </strong> {{ $pointVente->responsableVente_id }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Adresse: </strong> {{ $pointVente->adresse }} 
        </div>
    </div> 
</div> 
@endsection