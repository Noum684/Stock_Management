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
        $request->validate(['quantite' => 'required','point_vente_id'=>'required|exists:point_vente,id',]);
        Stock::create($request->all());
        return redirect()->route('stock.index') ->with('success','Stock créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Stock $stock)
    {
        return view('Admin.stocks.show',compact('stock'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stock $stock)
    {
        return view('Admin.stocks.edit',compact('stock'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Stock $stock)
    {
        
        $request->validate([ 'quantite' => 'required','point_vente_id'=>'required', ]); 
        $stock->update($request->all()); 
        return redirect()->route('stock.index') ->with('success','Stock mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stock $stock)
    {
        $stock->delete(); 
        return redirect()->route('stock.index') ->with('success','Stock supprimé avec succès');
    }
}
