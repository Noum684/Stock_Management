<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Ajout de l'importation
use App\Models\Commande;

class StatistiqueController extends Controller
{
    public function index()
    {
        // Récupérer les commandes groupées par statut
        $commandesParStatut = Commande::select('status', DB::raw('count(*) as total'))
            ->groupBy('status')
            ->pluck('total', 'status')
            ->toArray();

        // Séparer les statuts et les totaux pour Chart.js
        $statuts = array_keys($commandesParStatut);
        $totaux = array_values($commandesParStatut);

        return view('Admin.statistique.index', compact('statuts', 'totaux'));
    }


}
