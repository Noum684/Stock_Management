<?php

namespace App\Http\Controllers;

use App\Models\Commande;
use Illuminate\Http\Request;

class CommandeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $commande = Commande::latest()->paginate(4); return view('Admin.commandes.index',
       compact('commande')) ->with('i', (request()->input('page', 1) - 1) * 4);
        return view('Admin.commandes.show');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.commandes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'quantite'=>'required','produit_id'=>'required','status' => 'required',]);
        Commande::create($request->all()); 
        return redirect()->route('commande.index') ->with('success','Commande créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Commande $commande)
    {
        return view('Admin.commandes.show',compact('commande'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commande $commande)
    {
        
        return view('Admin.commandes.edit',compact('commande'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Commande $commande)
    {
        $request->validate([ 'quantite'=>'required','produit_id'=>'required','status' => 'required', ]); 
        $commande->update($request->all()); 
        return redirect()->route('commande.index') ->with('success','Commande mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commande $commande)
    {
        $commande->delete(); 
        return redirect()->route('commande.index') ->with('success','Commande supprimé avec succès');
    }
}
