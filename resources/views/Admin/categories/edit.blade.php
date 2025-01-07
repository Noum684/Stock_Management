@extends('layout') 
@section('content') 

<div class="row"> 
    <div class="col-lg-12 margin-tb"> 
        <div class="float-start"> 
            <h2>Modifier</h2>
         </div> 
         <div class="float-end"> <a class="btn btn-outline-primary" href="{{ route('Admin.categorie.index') }}"> Retour</a> 
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
<form action="{{ route('Admin.categorie.update',$categorie->id) }}" method="post"> 
@csrf 
@method('PUT') 
<div class="row g-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> <strong>Nom:</strong> 
             <input type="text" name="nom" value="{{ $categorie->nom }}" class="form-control" placeholder="Saisir le nom"> 
         </div> 
    </div> 
</div> 
<div class="row g-3"> 
    <div class="col-12 mb-3"> 
        <div class="form-group"> 
            <strong>Description:</strong> <input type="text" name="description" value="{{ $categorie->description}}" class="form-control" placeholder="Saisir la description"> 
        </div> 
    </div> 
</div>
<div class="col-12 mb-3"> 
    <div class="col-12 text-center "> 
        <button type="submit" class="btn btn-primary">Modifier</button> 
    </div> </div> 
</form> 
@endsection
 
                    
      