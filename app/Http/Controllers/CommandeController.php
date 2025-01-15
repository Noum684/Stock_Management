<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\PointVente;
use App\Services\ServiceStock;
use App\Models\Produit;
use App\Models\Stock;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    protected $stockService;

    public function __construct(ServiceStock $stockService)
    {
        $this->stockService = $stockService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $commande = Commande::with('produit')->paginate(10);
        return view(
            'Admin.commandes.index',
            compact('commande')
        )->with('i', (request()->input('page', 1) - 1) * 4);
        return view('Admin.commandes.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits = Produit::all();
        $pointVentes=PointVente::all();
        return view('Admin.commandes.create', compact('produits', 'pointVentes'));
    }
    public function livrer($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->status = 'Livrée';
        $commande->save();

        return redirect()->route('Admin.commande.index')->with('success', 'Commande marquée comme livrée.');
    }

    public function refuser($id)
    {
        $commande = Commande::findOrFail($id);
        $commande->status = 'Refusée ';
        $commande->save();

        return redirect()->route('Admin.commande.index')->with('success', 'Commande refusée.');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'produit_id' => 'required|exists:produit,id',
            'source_point_vente_id' => 'required|exists:point_vente,id',
            'destination_point_vente_id' => 'required|exists:point_vente,id',
            'quantite' => 'integer|min:1',

        ]);
        $stockSource = Stock::where('produit_id', $request->produit_id)
            ->where('point_vente_id', $request->source_point_vente_id)
            ->first();

        if (!$stockSource || $stockSource->quantite < $request->quantite) {
            return back()->withErrors('Quantité insuffisante dans le stock source.');
        }
    
        $commande = Commande::create([
            'produit_id' => $request->produit_id,
            'source_point_vente_id' => $request->point_vente_id,
            'destination_point_vente_id' => $request->point_vente_id,
            'quantite' => $request->quantite,
            'status' => 'En attente',
        ]);


        $stockSource->decrement('quantite', $request->quantite);

        return redirect()->route('Admin.commande.index')->with('success', 'Commande créée avec succès.');

        
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Commande::findOrFail($id);
        return view('Admin.commandes.show', compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {

        $produits = Produit::all();
        $poinVentes = PointVente::all();
        return view('Admin.commandes.edit', compact('produits', 'pointVentes', 'commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $request->validate([
            'produit_id' => 'required|exists:produit,id',
            'source_point_vente_id' => 'required|exists:point_vente,id',
            'destination_point_vente_id' => 'required|exists:point_vente,id',
            'quantite' => 'integer|min:1',
        ]);
        $commande->update($request->all());
        return redirect()->route('Admin.commande.index')->with('success', 'Commande mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete();
        return redirect()->route('Admin.commande.index')->with('success', 'Commande supprimé avec succès');
    }
}
