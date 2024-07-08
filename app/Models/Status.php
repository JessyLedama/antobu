<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     *  A status hasMany() companies
     */
    public function companies()
    {
        return $this->hasMany(CompanyDetail::class);
    }

    /**
     *  A status hasMany roles
     */
    public function roles()
    {
        return $this->hasMany(Role::class);
    }
}
