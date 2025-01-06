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
        return $this->hasOne(Stock::class);
    }
    public function commandes()
    {
        return $this->hasOne(Commande::class, 'produit_id');
    }

    
}
