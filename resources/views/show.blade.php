@if(auth()->user()->hasRole('responsable'))
    <p>Vous êtes un responsable.</p>
@endif

@if(auth()->user()->can('manage team'))
    <a href="{{ route('manage.team') }}">Gérer l'équipe</a>
@endif
