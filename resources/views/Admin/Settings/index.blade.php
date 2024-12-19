@extends('layout')

@section('content')
<h2>Paramètres</h2>
<form method="POST" action="{{ route('settings.update') }}">
    @csrf
    @foreach($settings as $setting)
        <div class="form-group mb-3">
            <label>{{ ucfirst($setting->key) }}</label>
            <input type="text" name="settings[{{ $setting->key }}]" class="form-control" value="{{ $setting->value }}">
        </div>
    @endforeach
    <button type="submit" class="btn btn-primary">Enregistrer</button>
</form>
@endsection
