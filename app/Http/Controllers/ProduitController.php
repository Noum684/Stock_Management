<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use App\Models\Produit;
use Illuminate\Http\Request;

class ProduitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $produit = Produit::latest()->paginate(4); return view('Admin.produits.index',
        compact('produit')) ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorie = Categorie::all(); 
        return view('Admin.produits.create', compact('categorie'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['nom' => 'required',  'categorie_id' => 'required','description' => 'required','prix' => 'required',]);
        Produit::create($request->all()); return redirect()->route('Admin.produit.index') ->with('success','Produit créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produit $produit)
    {
        return view('Admin.produits.show',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $produit=Produit::findOrFail($id);
        $categorie=Categorie::all();
        return view('Admin.produits.edit',compact('produit','categorie'));
    }
 
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produit $produit)
    {
        $request->validate(['nom' => 'required',  'categorie_id' => 'required','description' => 'required','prix' => 'required',]);
        $produit->update($request->all()); 
        return redirect()->route('Admin.produit.index') ->with('success','Produit mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produit $produit)
    {
        $produit->delete(); 
        return redirect()->route('Admin.produit.index') ->with('success','Produit supprimé avec succès');
    }
    
}
