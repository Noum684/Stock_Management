<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produit extends Model
{
    use HasFactory;
    protected $table="produit"; 
    public $primaryKey = 'id';
    public $incrementing = true; 
    protected $fillable = [ 'id','nom','categorie_id','description','prix'];


     public function stock()
    {
        return $this->hasMany(Stock::class);
    }
    public function commandes()
    {
        return $this->hasMany(Commande::class);
    }
    public function categorie(){
        return $this->belongsTo(Categorie::class);
    }

    
}
