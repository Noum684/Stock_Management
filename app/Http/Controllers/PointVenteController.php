<?php

namespace App\Http\Controllers;

use App\Models\PointVente;
use App\Models\Responsable;
use Illuminate\Http\Request;

class PointVenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pointVente = PointVente::latest()->paginate(4); return view('Admin.pointVentes.index',
        compact('pointVente')) ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $responsables = Responsable::all(); 
        return view('Admin.pointVentes.create', compact('responsables')); 
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'nom' => 'required', 'adresse' => 'required', 'responsable_id' => 'required', ]);
        PointVente::create($request->all()); 
        return redirect()->route('Admin.pointVente.index') ->with('success','Point de vente créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PointVente $pointVente)
    {
        return view('Admin.pointVentes.show',compact('pointVente'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PointVente $pointVente)
    {
        $responsables = Responsable::all(); 
        return view('Admin.pointVentes.edit', compact('responsables','pointVente')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, PointVente $pointVente)
    {
        $request->validate([ 'nom' => 'required', 'adresse' => 'required', 'responsable_id' => 'required', ]); 
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
