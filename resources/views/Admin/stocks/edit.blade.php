@extends('layout') 
@section('content') 

<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2>Modifier le stock</h2>
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-primary" href="{{ route('Admin.stock.index') }}">Retour</a> 
        </div>
    </div>
</div>
@if ($errors->any()) 
<div class="alert alert-danger"> 
    <ul> 
        @foreach ($errors->all() as $error) 
            <li>{{ $error }}</li>
        @endforeach 
    </ul> 
</div> 
@endif 
<form action="{{ route('Admin.stock.update', $stock->id) }}" method="POST"> 
    @csrf 
    @method('PUT') 
    <div class="row g-3"> 
        
        <div class="col-md-6"> 
            <label form-label><strong>Nom du produit:</strong></label> 
            <input type="text" name="nom" value="{{ $stock->produit_id }}" class="form-control" placeholder="Nom du stock">
        </div>
        <div class="col-12"> 
            <label form-label><strong>Quantité disponible:</strong></label> 
            <input type="text" name="quantite" value="{{ $stock->quantite}}" class="form-control" placeholder="quantitédu stock">
        </div> 
        <div class="col-12"> 
            <label form-label><strong>Localisation:</strong></label> 
            <input type="text" name="localisation" value="{{ $stock->point_vente_id }}" class="form-control" placeholder="Localisation">
        </div> 
    </div>
    <div class="col-12 text-center"> 
        <button type="submit" class="btn btn-primary">Modifier</button> 
    </div> 
</form> 
@endsection
