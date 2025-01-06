@extends('layout')
@section('content')

    <div class="row mb-3">
        <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Liste des responsables</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-success" href="{{ route('Admin.responsable.create') }}">+ Nouveau responsable</a>
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
        <th>Prénom</th>
        <th>Nom</th>
        <th>Email</th>
        <th>Téléphone</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($responsable as $respons)
    <tr>
        <td>{{ $respons->id }}</td>
        <td>{{ $respons->preom }}</td>
        <td>{{ $respons->nom }}</td>
        <td>{{ $respons->email}}</td>
        <td>{{ $respons->telephone}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <x-action-buttons 
                :show="route('Admin.responsable.show', $respons->id)" 
                :edit="route('Admin.responsable.edit', $respons->id)" 
                :delete="route('Admin.responsable.destroy', $respons->id)" />
        </td>
    </tr>
    @endforeach
</table>
<div class="d-flex justify-content-center pagination-lg"> 
    {!! $responsable->links('pagination::bootstrap-4') !!} 
</div>
@endsection
