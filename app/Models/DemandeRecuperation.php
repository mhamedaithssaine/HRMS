<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DemandeRecuperation extends Model
{
    protected $table ="demandes_recuperation";
    protected $fillable = [
        'user_id',
        'date',
        'heures_travaillees',
        'statut',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
