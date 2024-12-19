<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $responsable = Responsable::latest()->paginate(4); return view('Admin.responsables.index',
        compact('responsable')) ->with('i', (request()->input('page', 1) - 1) * 4);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.responsables.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 'prenom' => 'required', 'nom' => 'required', 'email' => 'required','telephone'=>'required', ]);
        Responsable::create($request->all()); 
        return redirect()->route('responsable.index') ->with('success','Responsable créé avec succès.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Responsable $responsable)
    {
        return view('Admin.responsables.show',compact('responsable'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Responsable $responsable)
    {
        return view('Admin.responsables.edit',compact('responsable'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsable $responsable)
    {
        $request->validate([ 'prenom' => 'required', 'nom' => 'required', 'email' => 'required','telephone'=>'required', ]); 
        $responsable->update($request->all()); return redirect()->route('responsable.index') ->with('success','Responsable mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsable $responsable)
    {
        $responsable->delete(); 
        return redirect()->route('responsable.index') ->with('success','Responsable supprimé avec succès');
    }
}
