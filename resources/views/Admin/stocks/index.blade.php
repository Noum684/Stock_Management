@extends('layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Liste des Stocks</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-success" href="{{ route('Admin.stock.create') }}">+ Nouveau Stock</a>
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
        <th>Nom du produit</th>
        <th>Quantité Disponible</th>
        <th>Localisation</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($stock as $stocks)
    <tr>
        <td>{{ $stocks->id }}</td>
        <td>{{ $stocks->produit->nom }}</td>
        <td>{{ $stocks->quantite }}</td>
        <td>{{ $stocks->point_Vente->adresse }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <x-action-buttons 
                :show="route('Admin.stock.show', $stocks->id)" 
                :edit="route('Admin.stock.edit', $stocks->id)" 
                :delete="route('Admin.stock.destroy', $stocks->id)" />
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center pagination-lg">
    {!! $stock->links('pagination::bootstrap-4') !!}
</div>
@endsection
