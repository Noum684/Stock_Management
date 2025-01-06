@extends('layout') 
@section('content')
 
<div class="row mb-4"> 
    <div class="col-lg-12"> 
        <div class="d-flex justify-content-between align-items-center">
            <h2> Afficher le responsable</h2>  
            <a class="btn btn-outline-primary" href="{{ route('Admin.responsable.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row mb-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $responsable->id }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Prénom: </strong> {{ $responsable->prenom }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Nom: </strong> {{ $responsable->nom }} 
        </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Email: </strong> {{ $responsable->email }} 
        </div>
    </div>
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Téléphone: </strong> {{ $responsable->telephone }} 
        </div>
    </div> 
</div> 
@endsection