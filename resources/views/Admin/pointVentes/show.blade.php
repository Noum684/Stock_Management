@extends('layout') 
@section('content')
 
<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2> Afficher le point de vente/h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.poinVente.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row"> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $pointVente->id }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> <strong>Nom: </strong> {{ $pointVnete->nom }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Responsable: </strong> {{ $pointVente->responsableVente_id }} 
        </div> 
    </div> 
    <div class="col-xs-12 col-sm-12 col-md-12"> 
        <div class="form-group"> 
            <strong>Adresse: </strong> {{ $pointVente->adresse }} 
        </div>
    </div> 
</div> 
@endsection