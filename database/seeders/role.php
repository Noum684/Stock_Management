<?php 
use App\Models\User;
$user = User::find('id');

$user->assignRole('responsable');

if ($user->hasRole('responsable')) {
    echo 'Cet utilisateur est un responsable.';
}

