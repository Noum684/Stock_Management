<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stock;
use App\Models\Commande;

class UserController extends Controller
{
    public function viewAllStocks()
    {
        $stocks = Stock::all(); // Admin voit tous les stocks
        return view('admin.stocks.index', compact('stocks'));
    }

    public function createUser()
    {
        return view('admin.users.create');
    }

    public function viewCommands()
    {
        // Admin peut voir toutes les commandes
        $commandes = Commande::all();
        return view('Admin.commandes.index', compact('commandes'));
    }
}
