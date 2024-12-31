<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\Stock;
use App\Models\PointVente;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Statistiques sur les produits
        $totalProduits = Produit::count();
        $produitStock = Produit::has('stock')->count();

        // Statistiques sur les stocks
        $totalQuantiteStock = Stock::sum('quantite');
        $stocksCritiques = Stock::where('quantite', '<', 10)->count(); // Stock critique < 10

        // Statistiques sur les points de vente
        $totalPointsVente = Pointvente::count();
        $ventesParPoint = Pointvente::withCount('produits')->orderBy('produits_count', 'desc')->take(5)->get();
        return view('statistiques.index', compact(
            'totalProduits',
            'produitStock',
            'totalQuantiteStock',
            'stocksCritiques',
            'totalPointsVente',
            'ventesParPoint'
        ));
    }

    // Fonction pour exporter les statistiques (exemple)
    public function export()
    {
        // Génération d'un rapport (CSV, PDF, etc.)
        return response()->json([
            'message' => 'Rapport exporté avec succès.',
   ]);
}


}
