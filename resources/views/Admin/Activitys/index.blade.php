@extends('layout')

@section('content')
<div class="row">
    <div class="col-lg-12">
        <h2>Journal des activités</h2>
        <a class="btn btn-success mb-3" href="{{ route('welcome') }}">Retour au tableau de bord</a>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
    </div>
</div>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Log Name</th>
            <th>Description</th>
            <th>Utilisateur</th>
            <th>Créé le</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($activitys as $activity)
        <tr>
            <td>{{ $activity->id }}</td>
            <td>{{ $activity->log_name }}</td>
            <td>{{ $activity->description }}</td>
            <td>{{ $activity->causer ? $activity->causer->name : 'N/A' }}</td>
            <td>{{ $activity->created_at->format('d/m/Y H:i') }}</td>
            <td>
                <a href="{{ route('activity.show', $activity->id) }}" class="btn btn-info btn-sm">Voir</a>
                <form action="{{ route('activity.destroy', $activity->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr ?')">Supprimer</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<div class="d-flex justify-content-center">
    {{ $activity->links() }}
</div>
@endsection
