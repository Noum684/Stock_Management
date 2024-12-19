<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            'view profile',
            'edit profile',
            'manage responsable',
            'create responsable',
            'view responsable',
            'edit stock',
            'edit commande',
            'edit produit',
            'edit categorie',
            'edit responsable',
            'edit pointVente',
            'view stock',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }

        // Créer le rôle 'user' avec des permissions spécifiques
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo(['view profile', 'edit profile']);

        // Créer le rôle 'responsable' avec toutes les permissions
        $responsableRole = Role::create(['name' => 'responsable']);
        $responsableRole->givePermissionTo(Permission::all());
    
    }
}
