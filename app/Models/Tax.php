<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tax extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug', 'amount', 'status_id'];

    /**
     *  A tax belongsTo a status
     */
    public function status()
    {
        return $this->belongsTo(Status::class, 'status_id');
    }
}
