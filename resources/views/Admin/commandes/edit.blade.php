@extends('layout') 
@section('content') 
<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2>Modifier la commande</h2>
         </div> 
         <div class="float-end"> <a class="btn btn-outline-primary" href="{{ route('Admin.commande.index') }}"> Retour</a> 
        </div>
    </div>
</div>
@if ($errors->any()) 
<div class="alert alert-danger"> <strong>Oups! 
        </strong> Il y a eu des problèmes avec votre entrée.<br><br> 
        <ul> 
            @foreach ($errors->all() as $error) <li>{{ $error }}</li>
             @endforeach </ul> 
</div> 
@endif 
<form action="{{ route('Admin.commande.update',$commande->id) }}" method="post"> 
@csrf @method('PUT') 
<div class="row mb-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group">
            <label for="produit_id"><strong>Nom du produit:</strong></label>
            @if($produits->isEmpty())
                <p class="text-danger">Aucun produit disponible.</p>
            @else
                <select name="produit_id" id="produit_id" class="form-select">
                    <option value="">-- Sélectionnez un produit --</option>
                    @foreach($produits as $produit)
                        <option value="{{ $produit->produit_id }}" {{ old('produit_id') == $produit->produit_id ? 'selected' : '' }}>
                            {{ $produit->nom }}
                        </option>
                    @endforeach
                </select>
            @endif
        </div> 
    </div>  
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Quantité commandée:</strong> <input type="text" name="quantite" value="{{ $commande->quantite}}" class="form-control" placeholder="Saisir la quantité"> 
        </div> 
    </div> 
    <div class="col-12 mb-3">
    <div class="form-group">
        <label for="responsable_id">Responsable</label>
        <select name="responsable_id" id="responsable_id" class="form-control">
            @foreach($responsables as $responsable)
                <option value="{{ $responsable->id }}">{{ $responsable->nom }} {{ $responsable->prenom }}</option>
            @endforeach
        </select>
    </div>
    </div>
    <div class="col-12 mb-3">
        <div class="form-group">
            <label for="status"><strong>Status:</strong></label>
            <select name="status" id="status" class="form-control">
                <option value="En attente" {{ old('status') == 'En attente' ? 'selected' : '' }}>En attente</option>
                <option value="Refusée" {{ old('status') == 'Refusée' ? 'selected' : '' }}>Refusée</option>
                <option value="Livrée" {{ old('status') == 'Livrée' ? 'selected' : '' }}>Livrée</option>
            </select>
        </div>
    </div>
</div>
<div class="row "> 
    <div class="col-12  "> 
        <button type="submit" class="btn btn-primary">Modifier</button> 
    </div> </div> 
</form> 
@endsection
 
