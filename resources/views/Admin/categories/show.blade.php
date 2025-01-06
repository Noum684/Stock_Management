@extends('layout') 

@section('content')
<div class="row mb-4"> 
    <div class="col-lg-12"> 
        <div class="d-flex justify-content-between align-items-center"> 
            <h2>Afficher la catégorie</h2>
            <a class="btn btn-outline-primary" href="{{ route('Admin.categorie.index') }}">Retour</a> 
        </div> 
    </div> 
</div> 

<div class="row mb-3">
    <div class="col-12 mb-3">
        <div class="form-group">
            <strong>Numéro :</strong> 
            <span>{{ $categorie->id }}</span>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <strong>Nom :</strong> 
            <span>{{ $categorie->nom }}</span>
        </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <strong>Description :</strong> 
            <span>{{ $categorie->description }}</span>
        </div>
    </div>
</div> 
@endsection
