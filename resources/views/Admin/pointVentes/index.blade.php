@extends('layout') 
@section('content') 

<div id="content-wrapper" class="d-flex flex-column">
    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
         <div class="float-start"> 
            <h2>Liste des points de ventes</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-success" href="{{ route('Admin.pointVente.create') }}"> +Nouveau point de points</a> 
        </div> 
    </div> 
</div> 
@if ($message = Session::get('success'))
 <div class="alert alert-success"> 
    <p>{{ $message }}</p>
 </div> 
 @endif
 <table class="table table-bordered">
    <tr>
        <th>Numéro</th>
        <th>Nom</th>
        <th>Adresse</th>
        <th>Responsable</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($pointVente as $pointVent)
    <tr>
        <td>{{ $pointVent->commande_id }}</td>
        <td>{{ $pointVent->nom }}</td>
        <td>{{ $pointVent->adresse }}</td>
        <td>{{ $pointVent->responsable->nom }}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <x-action-buttons 
                :show="route('Admin.pointVentes.show', $pointVent->point_Vente_id)" 
                :edit="route('Admin.pointVentes.edit', $pointVent->point_Vente_id)" 
                :delete="route('Admin.pointVentes.destroy', $pointvent->point_Vente_id)" />
        </td>
    </tr>
    @endforeach
</table> 
<div class="d-flex justify-content-center pagination-lg">
     {!! $pointVente->links('pagination::bootstrap-4') !!} 
</div>
@endsection