@extends('layout') 
@section('content')
 
<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2> Afficher la categorie</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.categorie.index') }}"> Retour</a> 
        </div> 
    </div> 
</div> 
<div class="row"> 
    <div class="col-md-6"> 
        <div class="form-group"> 
            <strong>Numéro: </strong> {{ $categoriee->id }} 
        </div> 
    </div> 
    <div class="col-md-6"> 
        <div class="form-group"> <strong>Nom: </strong> {{ $categorie->nom}} 
        </div> 
    </div> 
    <div class="col-md-6"> 
        <div class="form-group"> 
            <strong>Description: </strong> {{ $categorie->description}} 
        </div>
    </div> 
</div> 
@endsection