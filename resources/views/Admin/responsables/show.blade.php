@extends('layout') 
@section('content')
 
<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2> Afficher le responsable</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.responsable.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row g-3"> 
    <div class="col-md-6"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $responsable->id }} 
        </div> 
    </div> 
    <div class="col-6"> 
        <div class="form-group"> <strong>Prénom: </strong> {{ $responsable->prenom }} 
        </div> 
    </div> 
    <div class="col-md-6"> 
        <div class="form-group"> 
            <strong>Nom: </strong> {{ $responsable->nom }} 
        </div> 
    </div> 
    <div class="col--md-6"> 
        <div class="form-group"> 
            <strong>Email: </strong> {{ $responsable->email }} 
        </div>
    </div>
    <div class="col-md-6"> 
        <div class="form-group"> 
            <strong>Téléphone: </strong> {{ $responsable->telephone }} 
        </div>
    </div> 
</div> 
@endsection