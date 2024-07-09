<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'status_id'];

    /**
     *  Role belongsTo status
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }

    /**
     *  A role belongsToMany permissions.
     */
    public function permissions()
    {
        return $this->belongsToMany(Permission::class);
    }

    /**
     *  A role belongsToMany users.
     */
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
