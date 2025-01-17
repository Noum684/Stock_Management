<?php

namespace App\Http\Controllers;

use App\Models\Produit;
use App\Models\PointVente;
use App\Models\Stock;
use Illuminate\Http\Request;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stock = Stock::latest()->paginate(4); return view('Admin.stocks.index',
        compact('stock')) ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Produit::all(); 
        $pointVentes = PointVente::all(); 
        return view('Admin.stocks.create', compact('produits', 'pointVentes')); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'quantite' => 'required|integer|min:0',
            'produit_id'=>'required|exists:produit,id',
            'point_vente_id'=>'required|exists:point_vente,id',
            'seuil_m' => 'required|integer|min:0',
        ]);
        
        Stock::create([
            'quantite'=>$request->quantite,
            'produit_id'=>$request->produit_id,
            'point_vente_id'=>$request->point_vente_id,
            'seuil_m'=>$request->seuil_m
            
        ]);
        return redirect()->route('Admin.stock.index') ->with('success','Stock créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $stock = Stock::with('produit')->findOrFail($id);
        return view('Admin.stocks.show',compact('stock',));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        $produits = Produit::all(); 
        $pointVentes = PointVente::all(); 
        return view('Admin.stocks.edit', compact('produits', 'pointVentes','stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $request->validate([
            'quantite' => 'required|integer',
            'point_vente_id'=>'required|exists:point_vente,id'
        ]);

        $stock = Stock::findOrFail($id);
        $stock->update(['quantite' => $request->quantite]);

        return redirect()->route('Admin.stocks.index')->with('success', 'Stock mis à jour avec succès.');
    }

    public function checkLowStock()
    {
        $lowStocks = Stock::whereColumn('quantite', '<', 'seuil_m')->get();
        return view('stocks.low', compact('lowStocks'));
    }    
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete(); 
        return redirect()->route('Admin.stock.index') ->with('success','Stock supprimé avec succès');
    }
    // public function checphpkLowStock(){
    //     $lowStocks= Stock::whereColumn('quantite','<','seuil_m')->get();
    //     return view('Admin.stock.low', compact('lowStocks'));

    // }
}
