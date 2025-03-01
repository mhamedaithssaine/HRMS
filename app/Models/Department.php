<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    
    protected $table="departments";
    protected $fillable=['name','description'];

    public function emplois()
    {
        return $this->hasMany(Emplois::class);
    }
    public function users()
    {
        return $this->hasMany(User::class);
    }
}








