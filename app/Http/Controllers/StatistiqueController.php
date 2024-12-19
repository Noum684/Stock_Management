<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;
use App\Models\Commande;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Nombre total de produits
        $totalProduit = Produit::count();

        // Nombre total de commandes
        $totalCommande = Commande::count();

        // Produits les plus vendus
        $produitsPopulaire = Commande::selectRaw('produit_id, SUM(quantite) as total_vendu')
            ->groupBy('produit_id')
            ->orderByDesc('total_vendu')
            ->take(5)
            ->get();

        // Stocks par point de vente
        $stock = Produit::select('nom', 'stock_id')
            ->orderBy('stock', 'desc')
            ->get();

        return view('statistiques.index', compact('totalProduit', 'totalCommande', 'produitsPopulaire', 'stock'));
    }
    public function showOnWelcome()
{
    // Données pour les statistiques
    $totalProduit = Produit::count();
    $totalCommande = Commande::count();
    $produitsPopulaire = Commande::selectRaw('produit_id, SUM(quantite) as total_vendu')
        ->groupBy('produit_id')
        ->orderByDesc('total_vendu')
        ->take(5)
        ->get();

    $stock = Produit::select('nom', 'stock-id')
        ->orderBy('stock', 'desc')
        ->get();

    // Retourner la vue welcome avec les données
    return view('welcome', compact('totalProduit', 'totalCommande', 'produitsPopulaire', 'stock'));
}

}
