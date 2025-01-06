<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory; protected $table="commande"; public $primaryKey = 'id'; 
    public $incrementing = true; 
    protected $fillable = [ 'id','quantite','produit_id', 'status'];

    public function produits()
    {
        return $this->belongsToMany(Produit::class)->withPivot('quantite');
    }


    public function calculerTotalCommande($commandeId)
{
    $commande = Commande::find($commandeId);

    $total = $commande->produits->reduce(function ($carry, $produit) {
        return $carry + ($produit->prix * $produit->pivot->quantite);
    }, 0);

    $commande->total = $total;
    $commande->save();

    return $total;
}
public function produit()
{
    return $this->belongsTo(Produit::class, 'produit_id');
}

}
