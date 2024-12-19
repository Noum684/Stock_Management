<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory; 
    protected $table="stock"; 
    public $primaryKey = 'id'; 
    public $incrementing = true; 
    protected $fillable = [ 'id', 'quantite','point_vente_id'];
    public function produits()
    {
        return $this->hasMany(Produit::class);
    }
    
    /**
     * Get the responsable that owns the Stock
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function responsable()
    {
        return $this->belongsTo(Responsable::class);
    }

/**
 * Calculate the total quantity of products for a given stock.
 *
 * @param int $stockId
 * @return int
 */
    public function getQuantiteTotale($stockId)
{
    $stock = Stock::find($stockId);

    $totalQuantite = $stock->produits->sum('quantite');

    return $totalQuantite;
}
public function verifierStock($commandeId)
{
    $commande = Commande::find($commandeId);

    foreach ($commande->produits as $produit) {
        if ($produit->quantite < $produit->pivot->quantite) {
            return "Le produit {$produit->nom} n'est pas disponible en quantité suffisante.";
        }
    }

    return "Tous les produits sont disponibles.";
}

}
