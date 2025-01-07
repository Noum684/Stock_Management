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
    protected $fillable = [ 'id', 'prenom','nom','email','telephone'];

    public function pointVentes()
{
    return $this->hasMany(PointVente::class);
}
}
