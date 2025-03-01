<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable =[
        'type', 
        'start_date', 
        'end_date',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
