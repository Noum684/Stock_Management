@extends('layout')

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Ajouter Point de Vente</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-primary" href="{{ route('Admin.pointVente.index') }}">Retour</a>
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

<form action="{{ route('Admin.pointVente.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Nom :</strong>
                <input type="text" name="nom" class="form-control" placeholder="Saisir le nom du point de vente">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
                <strong>Adresse:</strong>
                <input type="text" name="adresse" class="form-control" placeholder="Saisir l'adresse">
            </div>
        </div>
        <div class="col-12 mb-3">
            <div class="form-group">
            <label for="responsable_id">Responsable</label>
            <select name="responsable_id" id="responsable_id" class="form-control" required>
                <option value="">-- Sélectionnez un responsable --</option>
                @foreach($responsables as $responsable)
                    <option value="{{ $responsable->id }}">{{ $responsable->nom }} {{ $responsable->prenom }}</option>
                @endforeach
            </select>
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
