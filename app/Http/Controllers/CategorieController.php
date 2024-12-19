<?php

namespace App\Http\Controllers;

use App\Models\Categorie;
use Illuminate\Http\Request;

class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorie = Categorie::latest()->paginate(4); return view('Admin.categories.index',
        compact('categorie')) ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'nom' => 'required','description'=>'required',]);
        Categorie::create($request->all()); 
        return redirect()->route('categorie.index') ->with('success','Categorie créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Categorie $categorie)
    {
        return view('Admin.categories.show',compact('categorie'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view('Admin.categories.edit',compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Categorie $categorie)
    {
        $request->validate([ 'nom' => 'required','description'=>'required', ]); 
        $categorie->update($request->all()); 
        return redirect()->route('categorie.index') ->with('success','Categorie mise à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categorie $categorie)
    {
        $categorie->delete(); 
        return redirect()->route('categorie.index') ->with('success','Categorie supprimé avec succès');
    }
}
