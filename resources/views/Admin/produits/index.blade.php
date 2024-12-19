@extends('layout') 
@section('content') 

<div id="content-wrapper" class="d-flex flex-column">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
         <div class="float-start"> 
            <h2>Liste des prduits</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-success" href="{{ route('produit.create') }}"> +Nouvel produit</a> 
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
        <th>Stock</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($produit as $prod)
    <tr>
        <td>{{ $prod->produit_id }}</td>
        <td>{{ $prod->nom }}</td>
        <td>{{ $prod->categorie->nom }}</td>
        <td>{{ $prod->prix }}</td>
        <td>{{ $prod->description }}</td>
        <td>{{ $prod->stock->quantite }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <x-action-buttons 
                :show="route('Admin.produits.show', $prod->produit_id)" 
                :edit="route('Admin.produits.edit', $prod->produit_id)" 
                :delete="route('Admin.produits.destroy', $prod->produit_id)" />
        </td>
    </tr>
    @endforeach
</table> 
<div class="d-flex justify-content-center pagination-lg">
     {!! $produit->links('pagination::bootstrap-4') !!} 
</div>
</div>
@endsection