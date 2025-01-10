<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory; 
    protected $table="commande"; 
    public $primaryKey = 'id'; 
    public $incrementing = true; 
    protected $fillable = [ 'id','produit_id','quantite','responsable_id', 'status'];

    public function produit()
    {
        return $this->belongsTo(Produit::class);
    }
    
    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
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

}
