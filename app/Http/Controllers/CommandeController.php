<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use App\Models\Produit;
use App\Models\Responsable;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $commande = Commande::with('produit')->paginate(10); return view('Admin.commandes.index',
       compact('commande')) ->with('i', (request()->input('page', 1) - 1) * 4);
        return view('Admin.commandes.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $produits= Produit::all();
        $responsables=Responsable::all();
        return view('Admin.commandes.create',compact('produits','responsables'));
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
        'responsable_id' => 'required|exists:responsable,id',
        'produit' => 'required|array',
        'produit.*.id' => 'exists:produit,id',
        'produit.*.quantite' => 'integer|min:1',]);
        $commande = Commande::create(['responsable_id' => $request->responsable_id]);

        foreach ($request->produits as $produit) {
            $commande->produits()->attach($produit['id'], ['quantite' => $produit['quantite']]);
        }

        return redirect()->route('Admin.commande.index')->with('success', 'Commande créée.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $order = Commande::findOrFail($id);
        return view('Admin.commandes.show',compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        
        $produits= Produit::all();
        $responsables=Responsable::all();
        return view('Admin.commandes.edit',compact('produits','responsables','commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $request->validate([ 'produit_id'=>'required|exists:produit,id','quantite'=>'required','status' => 'required', ]); 
        $commande->update($request->all()); 
        return redirect()->route('Admin.commande.index') ->with('success','Commande mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete(); 
        return redirect()->route('Admin.commande.index') ->with('success','Commande supprimé avec succès');
    }
}
