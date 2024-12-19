@extends('layout') 
@section('content') 

<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2>Modifier</h2>
         </div> 
         <div class="float-end"> <a class="btn btn-outline-primary" href="{{ route('produit.index') }}"> Retour</a> 
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
@endif <form action="{{ route('produit.update',$produit->produit_id) }}" method="post"> 
@csrf @method('PUT') 
<div class="row g-3"> 
    <div class="col-md-6"> 
        <div class="form-group"> <strong>Nom:</strong> 
             <input type="text" name="nom" value="{{ $produit->nom }}" class="form-control" placeholder="Saisir le nom du produit"> 
         </div> 
    </div> 
</div> 
<div class="row">
    <div class="col-12">
        <div class="form-group">
            <strong>Catégorie:</strong>
            <select name="categorie_id" class="form-control">
                @foreach($categories as $categorie)
                    <option value="{{ $categorie->categorie_id }}" {{ $produit->categorie_id == $categorie->categorie_id ? 'selected' : '' }}>
                        {{ $categorie->nom }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row"> 
    <div class="col-12 text-center "> 
        <button type="submit" class="btn btn-primary">Modifier</button> 
    </div> </div> 
</form> 
@endsection
 
                    
      