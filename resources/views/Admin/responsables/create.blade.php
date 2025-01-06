@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Nouveau Responsable</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{ route('Admin.responsable.index') }}">Retour</a>
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

<form action="{{ route('Admin.responsable.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Prénom:</strong>
                <input type="text" name="prenom" class="form-control" placeholder="Saisir le prénom">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Nom:</strong>
                <input type="text" name="nom" class="form-control" placeholder="Saisir le nom">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Email:</strong>
                <input type="email" name="email" class="form-control" placeholder="Saisir l'email">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Téléphone:</strong>
                <input type="text" name="telephone" class="form-control" placeholder="Saisir le téléphone">
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
