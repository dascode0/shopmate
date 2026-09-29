<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'city',
        'state',
        'country',
        'pincode',
        'currency',
        'timezone',
        'database_name',
        'database_status',
        'status',
    ];

    /**
     * Company has many users.
     */
    public function users()
    {
        return $this->hasMany(User::class);
    }
}