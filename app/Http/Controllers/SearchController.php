<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produit;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = $request->input('query');
        $results = Produit::where('name', 'LIKE', "%$query%")
            ->orWhere('description', 'LIKE', "%$query%")
            ->get();

        return response()->json($results);
    }
}
