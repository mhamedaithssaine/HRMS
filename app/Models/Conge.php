<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Conge extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'date_debut',
        'date_fin',
        'raison',
        'statut',
        'approbation_manager',
        'approbation_rh',
    ];

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
