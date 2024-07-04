<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Newsletter extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'content', 'cover', 'status_id'];

    /**
     *  A newsletter belongsTo() a status.
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
