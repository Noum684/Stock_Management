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
        $totalProduits = Produit::count();

        // Nombre total de commandes
        $totalCommandes = Commande::count();

        // Produits les plus vendus
        $produitsPopulaires = Commande::selectRaw('produit_id, SUM(quantite) as total_vendu')
            ->groupBy('produit_id')
            ->orderByDesc('total_vendu')
            ->take(5)
            ->get();

        // Stocks par point de vente
        $stocks = Produit::select('nom', 'stock')
            ->orderBy('stock', 'desc')
            ->get();

        return view('statistiques.index', compact('totalProduits', 'totalCommandes', 'produitsPopulaires', 'stocks'));
    }
}
