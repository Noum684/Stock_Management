@extends('layout')
@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Liste des Catégories</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-success" href="{{ route('Admin.categorie.create') }}">+ Nouvelle Catégorie</a>
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
        <th>Nom</th>
        <th>Description</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($categorie as $cat)
    <tr>
        <td>{{ $cat->id }}</td>
        <td>{{ $cat->nom }}</td>
        <td>{{ $cat->description }}</td>
        <td>
            <x-action-buttons 
                :show="route('Admin.categorie.show', $cat->id)" 
                :edit="route('Admin.categorie.edit', $cat->id)" 
                :delete="route('Admin.categorie.destroy', $cat->id)" />
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center pagination-lg">
    {!! $categorie->links('pagination::bootstrap-4') !!}
</div>
@endsection
