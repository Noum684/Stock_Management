<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory; 
    protected $table="responsable"; 
    public $primaryKey = 'id'; 
    public $incrementing = true; 
    protected $fillable = [ 'id', 'prenom','nom','email','telephone','password','point_vente_id'];


    public function pointVente()
     {
        return $this->belongsTo(PointVente::class);
     }
}
