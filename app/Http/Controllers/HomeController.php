<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Produit;

class HomeController extends Controller
{
    public function index()
    {
        $nombreProduits = Produit::count(); // Nombre total de produits
        $totalQuantiteStock = Stock::sum('quantite'); // Quantité totale en stock

        $stocks = Stock::with('produit')->get(); // Affichage  des produits avec leur stock

        return view('welcome', compact('nombreProduits', 'totalQuantiteStock', 'stocks'));
    }
}
