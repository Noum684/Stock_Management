@extends('layout') 
@section('content') 

<div id="content-wrapper" class="d-flex flex-column">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
         <div class="float-start"> 
            <h2>Liste des prduits</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-success" href="{{ route('Admin.produit.create') }}"> +Nouvel produit</a> 
        </div> 
    </div> 
</div> 
@if ($message = Session::get('success'))
 <div class="alert alert-success"> 
    <p>{{ $message }}</p>
 </div> 
 @endif
<table class="table table-striped">
    <tr>
        <th>Numéro</th>
        <th>Nom </th>
        <th>Catégorie</th>
        <th>Prix Unitaire</th>
        <th>Description</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($produit as $prod)
    <tr>
        <td>{{ $prod->id }}</td>
        <td>{{ $prod->nom}}</td>
        <td>{{ $prod->categorie->nom }}</td>
        <td>{{ $prod->description }}</td>
        <td>{{ $prod->prix }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <x-action-buttons 
                :show="route('Admin.produit.show', $prod->id)" 
                :edit="route('Admin.produit.edit', $prod->id)" 
                :delete="route('Admin.produit.destroy', $prod->id)" />
        </td>
    </tr>
    @endforeach
</table> 
<div class="d-flex justify-content-center pagination-lg">
     {!! $produit->links('pagination::bootstrap-4') !!} 
</div>
</div>
@endsection