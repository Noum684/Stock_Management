<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity as SpatieActivity;


class Activity extends SpatieActivity
{
    use HasFactory;

    protected $fillable = ['log_name','description', 'users_id', 'subject_type', 'subject_id', 'properties'];
     
    public function users()
{
    return $this->belongsTo(User::class);
}
}
