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
    <div class="row mb-3"> 
        
            <div class="col-12 mb-3">
                <div class="form-group">
                    <strong>Quantité disponible:</strong>
                    <input type="number" name="quantite" class="form-control" placeholder="Saisir la quantite">
                </div>
                
    <div class="col-12 "> 
        <button type="submit" class="btn btn-primary">Modifier</button> 
    </div> 
    </div>
</form> 
@endsection
