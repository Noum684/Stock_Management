<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointVente extends Model
{
    use HasFactory;
    protected $table = "point_vente";
    public $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ['id', 'nom', 'adresse',];

    public function responsable()
{
    return $this->hasOne(Responsable::class);
}

    public function stock(){
        return $this->hasMany(Stock::class);
    }
}
