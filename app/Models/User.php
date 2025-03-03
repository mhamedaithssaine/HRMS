<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\Cursus;
use App\Models\Emplois;
use App\Models\Contract;
use App\Models\Department;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory,
    Notifiable,
    HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'date_of_birth',
        'address',
        'recrut_date',
        'salary',
        'status',
        'department_id',
        'emplois_id',
        'contract_id',

    ];

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

    public function cursus()
{
    return $this->hasMany(Cursus::class);
}

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


   
}
