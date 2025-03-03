<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model
{
    use HasFactory;
    protected $table = 'cursus';
    protected $fillable = [
        'user_id',
        'grade',
        'date',
        'campus',
        'contrat',
        'formation',
        'position',
        'remarques',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
