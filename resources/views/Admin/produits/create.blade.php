@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Ajouter un produit</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{ route('Admin.produit.index') }}">Retour</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Oups! </strong> Il y a eu des problèmes avec votre entrée.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('Admin.produit.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Nom :</strong>
                <input type="text" name="nom" class="form-control" placeholder="Saisir le nom du produit">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Catégorie:</strong>
                <select name="categorie_id" class="form-control">
                    @foreach($categorie as $cat)
                        <option value="{{ $cat->categorie_id }}">{{ $categorie->nom }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Description:</strong>
                <textarea name="description" class="form-control" placeholder="Saisir la description"></textarea>
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Prix Unitaire:</strong>
                <input type="text" name="prix" class="form-control" placeholder="Saisir le prix">
            </div>
            
            </div>
        </div>
        
        

    <div class="row">
        <div class="col-12 ">
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </div>
    </div>
</form>
@endsection
