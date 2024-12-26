<?php

namespace Database\Seeders;

use App\Models\PointVente;
use App\Models\Produit;
use App\Models\User;
use App\Models\Stock;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $produits=Produit::all();
        $point_ventes=PointVente::all();
        foreach($produits as $produit){
            Stock::create([
                'quantite'=>rand(50, 500),
                'produit_id'=>$produit->id,
                'point_vente_id'=>$point_ventes->id,
                'seuil_m'=>10,
            ]);
        }
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
