<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cursus extends Model
{
    use HasFactory;
    protected $table = 'cursus';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'user_id',
        'department_id',
        'emplois_id',
        'contract_id',
        'grade',
        'campus',
        'formation',
        'remarques',

    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    public function emplois()
    {
        return $this->belongsTo(Emplois::class);
    }

    public function contract()
    {
        return $this->belongsTo(Contract::class);
    }
}
