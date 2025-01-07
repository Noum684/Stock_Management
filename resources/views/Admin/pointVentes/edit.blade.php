@extends('layout') 
@section('content') 

<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2>Modifier</h2>
         </div> 
         <div class="float-end"> <a class="btn btn-outline-primary" href="{{ route('Admin.pointVente.index') }}"> Retour</a> 
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
@endif <form action="{{ route('pointVente.update',$pointVente->id) }}" method="post"> 
@csrf @method('PUT') 

<div class="row mb-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> <strong>Nom:</strong> 
             <input type="text" name="nom" value="{{ $pointVente->nom }}" class="form-control" placeholder="Saisir le nom"> 
         </div> 
    </div> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Adresse:</strong> <input type="text" name="adresse" value="{{ $pointVente->adresse}}" class="form-control" placeholder="Saisir l'adresse'"> 
        </div> 
    </div> 
    <div class="col-12 mb-3">
        <div class="form-group">
            <strong>Responsable:</strong>
            <select name="categorie_id" class="form-control">
                @foreach($responsables as $responsable)
                    <option value="{{ $responsable->responsable_id }}" {{ $pointVente->responsable_id == $responsable->responsable_id ? 'selected' : '' }}>
                        {{ $responsable->nom }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
</div>
<div class="row "> 
    <div class="col-12 "> 
        <button type="submit" class="btn btn-primary">Modifier</button> 
    </div> </div> 
</form> 
@endsection
 
                    
      