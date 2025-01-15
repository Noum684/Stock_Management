<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Produit;
use App\Models\Commande;
use App\Models\PointVente;
use App\Models\Responsable;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $nombreProduits = Produit::count(); // Nombre total de produits
        $totalQuantiteStock = Stock::sum('quantite'); // Quantité totale en stock
        $stocksCritiques = DB::table('stock')->where('quantite', '<=', 10)->get();
        $produitsAvecStock = Produit::has('stock')->count();
        $stocksDisponible = Stock::where('quantite', '>', 10)->count();
        $totalCommandes = Commande::count();
        $livrees = Commande::where('status', 'Livrée')->count();
        $enAttente = Commande::where('status', 'En attente')->count();
        $refusees = Commande::where('status', 'Refusée')->count();
        $nombrePointVente=PointVente::count();
        // $ventesParPoint = Pointvente::withCount('produit')->orderBy('produits_count', 'desc')->take(5)->get();
        $nombreResponsable=Responsable::count();
        $alerts=
        $commandesParStatut = Commande::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        // Séparer les statuts et les totaux pour Chart.js
        $statuts = array_keys($commandesParStatut);
        $totaux = array_values($commandesParStatut);

        $stocks = Stock::with('produit')->get(); // Affichage  des produits avec leur stock

        return view('welcome', compact('nombreProduits', 'totalQuantiteStock', 'produitsAvecStock','stocksCritiques','stocksDisponible','totalCommandes','enAttente','livrees' ,'refusees','nombrePointVente','nombreResponsable','stocks','alerts','statuts','totaux'));
    }
    public function export()
    {
        // Génération d'un rapport (CSV, PDF, etc.)
        return response()->json([
            'message' => 'Rapport exporté avec succès.',
        ]);
    }
    
}
