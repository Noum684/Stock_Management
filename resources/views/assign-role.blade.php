@extends('layout')

@section('content')
<div class="container">
    <h2>Attribuer un rôle</h2>
    <form method="POST" action="{{ route('roles.assign', $user->id) }}">
        @csrf
        <label for="role">Rôle :</label>
        <select name="role" id="role" class="form-control">
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ $role->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success mt-3">Attribuer</button>
    </form>

    <h2 class="mt-5">Attribuer une permission</h2>
    <form method="POST" action="{{ route('permissions.assign', $user->id) }}">
        @csrf
        <label for="permission">Permission :</label>
        <select name="permission" id="permission" class="form-control">
            @foreach($permissions as $permission)
                <option value="{{ $permission->name }}">{{ $permission->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-success mt-3">Attribuer</button>
    </form>
</div>
@endsection
