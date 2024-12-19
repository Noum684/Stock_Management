<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory; protected $table="produit"; public $primaryKey = 'id';
     public $incrementing = true; 
     protected $fillable = [ 'id','nom','categorie_id','prix','description','stock_id'];

     public function stock()
    {
        return $this->belongsTo(Stock::class);
    }

    // Relation avec la catégorie
    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    // Relation avec les commandes (many-to-many)
    public function commandes()
    {
        return $this->belongsToMany(Commande::class)->withPivot('quantite');
    }
}
