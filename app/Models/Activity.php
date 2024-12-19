<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity as SpatieActivity;


class Activity extends SpatieActivity
{
    use HasFactory;

    protected $fillable = ['description', 'causer_id', 'subject_type', 'subject_id', 'properties'];
     
    
}
