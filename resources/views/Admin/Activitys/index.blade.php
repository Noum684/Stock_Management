@extends('layout')

@section('content')

<div class="row mb-3">
    <div class="col-lg-12 margin-tb">
        <div class="float-start">
            <h2>Liste des Activités</h2>
        </div>
        <div class="float-end">
            <a class="btn btn-outline-success" href="{{ route('Admin.activities.create') }}">+ Nouvelle Activité</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom du Journal</th>
            <th>Description</th>
            <th>Utilisateur</th>
            <th>Date</th>
            <th width="200px">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($activities as $activity)
            <tr>
                <td>{{ $activity->id }}</td>
                <td>{{ $activity->log_name }}</td>
                <td>{{ $activity->description }}</td>
                <td>{{ $activity->user->name ?? 'Utilisateur Inconnu' }}</td>
                <td>{{ $activity->created_at->format('d-m-Y H:i') }}</td>
                <td>
                    <a href="{{ route('activities.show', $activity->id) }}" class="btn btn-info btn-sm">Afficher</a>
                    <a href="{{ route('activities.edit', $activity->id) }}" class="btn btn-primary btn-sm">Éditer</a>
                    <form action="{{ route('activities.destroy', $activity->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette activité ?')">Supprimer</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {!! $activities->links('pagination::bootstrap-4') !!}
</div>

@endsection
