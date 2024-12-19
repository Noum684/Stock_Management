<div>
    <a class="btn btn-outline-primary" href="{{ $show }}">Afficher</a>
    <a class="btn btn-outline-success" href="{{ $edit }}">Éditer</a>
    <form action="{{ $delete }}" method="POST" class="d-inline">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline-danger">Supprimer</button>
    </form>
</div>