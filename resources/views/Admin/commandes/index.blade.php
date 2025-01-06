@extends('layout')
@section('content')

<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
         <div class="float-start"> 
            <h2>Liste des commandes</h2> 
        </div> 
        <div class="float-end"> 
            <a class="btn btn-outline-success" href="{{ route('Admin.commande.create') }}"> +Nouvelle commande</a> 
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
        <th>Quantité Commandée</th>
        <th>Status</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($commande as $com)
    <tr>
        <td>{{ $com->id }}</td>
        <td>{{ $com->produit->nom ?? 'Produit non défini' }}</td>
        <td>{{ $com->quantite }}</td>
        <td>{{ ucfirst($commande->statut) }}</td>
                    <td>
                        @if($commande->statut == 'En attente')
                            <a href="{{ route('commande.livrer', $commande->id) }}" class="btn btn-success">Livrer</a>
                            <a href="{{ route('commande.Refuser', $commande->id) }}" class="btn btn-danger">Refuser</a>
                        @else
                            <span class="badge bg-info">{{ ucfirst($commande->statut) }}</span>
                        @endif
                    </td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <x-action-buttons 
                :show="route('Admin.commandes.show', $com->id)" 
                :edit="route('Admin.commandes.edit', $com->id)" 
                :delete="route('Admin.commandes.destroy', $com->id)" />
        </td>
    </tr>
    @endforeach
</table> 
<div class="d-flex justify-content-center pagination-lg"> 
    {!! $commande->links('pagination::bootstrap-4') !!} 
</div>
@endsection

