<?php

namespace App\Http\Controllers;

use App\Models\PointVente;
use App\Models\Responsable;
use App\Models\Stock;
use App\Models\Transfert;
use App\Jobs\ProcessTransfer;
use Illuminate\Http\Request;

class PointVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pointVente = PointVente::all()->paginate(4); return view('Admin.pointVentes.index',
        compact('pointVente')) ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.pointVentes.create',); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'nom' => 'required', 'adresse' => 'required', ]);
        PointVente::create($request->all()); 
        return redirect()->route('Admin.pointVente.index') ->with('success','Point de vente créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $pointVente = PointVente::findOrFail($id);
        $stocks = Stock::where('point_vente_id', $id)->get();
        return view('Admin.pointVentes.show',compact('pointVente','stocks'));
    }
    public function transfert(Request $request)
    {
        $request->validate([
            'produit_id' => 'required|exists:produits,id',
            'point_vente_id' => 'required|exists:points_vente,id',
            'quantite' => 'required|integer|min:1',
        ]);
        $stockEntrepot = Stock::where('produit_id', $request->produit_id)
            ->whereNull('point_vente_id')
            ->first();

        if (!$stockEntrepot || $stockEntrepot->quantite < $request->quantite) {
            return back()->withErrors('Stock insuffisant à l’entrepôt.');
        }
        $stockEntrepot->quantite -= $request->quantite;
        $stockEntrepot->save();

        // Ajouter au stock du point de vente
        $stockPointVente = Stock::firstOrCreate(
            ['produit_id' => $request->produit_id, 'point_vente_id' => $request->point_vente_id],
            ['quantite' => 0]
        );
        $stockPointVente->quantite += $request->quantite;
        $stockPointVente->save();
        // event(new StockUpdated($produit->nom, $stock->quantite));
        

        // ProcessTransfer::dispatch($produit, $quantite, $pointVenteId);

        // Enregistrer le transfert
        Transfert::create([
            'produit_id' => $request->produit_id,
            'point_vente_id' => $request->point_vente_id,
            'quantite' => $request->quantite,
            'statut' => 'approuvé',
        ]);

        return back()->with('success', 'Transfert effectué avec succès.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PointVente $pointVente)  
    {
        
        return view('Admin.pointVentes.edit', compact('pointVente')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PointVente $pointVente)
    {
        $request->validate([ 'nom' => 'required', 'adresse' => 'required', ]); 
        $pointVente->update($request->all()); 
        return redirect()->route('Admin.pointVente.index') ->with('success','Point de vente mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PointVente $pointVente)
    {
        $pointVente->delete(); 
        return redirect()->route('pointVente.index') ->with('success','PointVente supprimé avec succès');
    }
}
