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
        $commandeData = [
            'labels' => ['En attente', 'Livrée', 'Annulée'],
            'values' => [10, 15, 5],
        ];
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

        $stocks = Stock::with('produit')->get(); // Affichage  des produits avec leur stock

        return view('welcome', compact('commandeData','nombreProduits', 'totalQuantiteStock', 'produitsAvecStock','stocksCritiques','stocksDisponible','totalCommandes','enAttente','livrees' ,'refusees','nombrePointVente','nombreResponsable','stocks'));
    }
    
}
