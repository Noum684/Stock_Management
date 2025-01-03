@extends('layout')
@section('content')

<div id="content-wrapper" class="d-flex flex-column">
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
        <td>{{ $respons->responsable_id }}</td>
        <td>{{ $respons->preom }}</td>
        <td>{{ $respons->nom }}</td>
        <td>{{ $respons->email}}</td>
        <td>{{ $respons->telephone}}</td>
        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
            <x-action-buttons 
                :show="route('Admin.responsables.show', $respons->responsable_id)" 
                :edit="route('Admin.responsables.edit', $respons->responsable_id)" 
                :delete="route('Admin.responsables.destroy', $respons->responsable_id)" />
        </td>
    </tr>
    @endforeach
</table>

<div class="d-flex justify-content-center pagination-lg">
    {!! $responsable->links('pagination::bootstrap-4') !!}
</div>
@endsection
</table> 
<div class="d-flex justify-content-center pagination-lg"> 
    {!! $responsable->links('pagination::bootstrap-4') !!} 
</div>


</div>
@endsection
