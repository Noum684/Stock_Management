<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleController extends Controller
{
    public function assignRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $role = $request->input('role');

        // Vérifier si le rôle existe
        if (Role::where('name', $role)->exists()) {
            $user->syncRoles([$role]);
            return back()->with('success', "Rôle '$role' attribué avec succès à l'utilisateur.");
        }

        return back()->with('error', "Le rôle '$role' n'existe pas.");
    }

    public function assignPermission(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $permission = $request->input('permission');

        // Vérifier si la permission existe
        if (Permission::where('name', $permission)->exists()) {
            $user->givePermissionTo($permission);
            return back()->with('success', "Permission '$permission' attribuée avec succès.");
        }

        return back()->with('error', "La permission '$permission' n'existe pas.");
    }
}
