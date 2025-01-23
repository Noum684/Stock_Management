<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
// use Illuminate\Database\Eloquent\Model;

class Responsable extends Authenticatable
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
