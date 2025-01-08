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
    protected $fillable = [ 'id', 'quantite','produit_id','point_vente_id','seuil_m'];
    public function produit()
    {
        return $this->belongsTo(Produit::class);
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
    



}
