<?php

namespace App\Http\Controllers;

use App\Models\Responsable;
use Illuminate\Http\Request;
use App\Models\PointVente;
use App\Models\Stock;
use Illuminate\Support\Facades\Auth;

class ResponsableController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viewOwnStock()
    {
        $user = Auth::user();
        $stocks = Stock::where('point_vente_id', $user->point_vente_id)->get();
        return view('responsable.stocks.index', compact('stocks'));
    }


    public function createCommand()
    {
        return view('responsable.commandes.create');
    }
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
        $pointVentes = PointVente::all(); 
        return view('Admin.responsables.create', compact('pointVentes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([ 
            'prenom' => 'required', 
            'nom' => 'required', 
            'email' => 'required',
            'telephone'=>'required',
            'password' => $request->password, 
            'point_vente_id'=>'required|exists:point_vente,id',

        ]);
        Responsable::create($request->all()); 
        return redirect()->route('Admin.responsable.index') ->with('success','Responsable créé avec succès.');
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
        $pointVentes = PointVente::all();
        return view('Admin.responsables.edit',compact('responsable','pointVentes'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Responsable $responsable)
    {
        $request->validate([ 
            'prenom' => 'required', 
            'nom' => 'required', 
            'email' => 'required',
            'telephone'=>'required',
            'password' => $request->password,
            'point_vente_id'=>'required|exists:point_vente,id',
        ]); 
        $responsable->update($request->all()); 
        return redirect()->route('Admin.responsable.index') ->with('success','Responsable mis à jour avec succès.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Responsable $responsable)
    {
        $responsable->delete(); 
        return redirect()->route('Admin.responsable.index') ->with('success','Responsable supprimé avec succès');
    }
}
